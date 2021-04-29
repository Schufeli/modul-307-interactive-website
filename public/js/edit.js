window.addEventListener("load", function(){
    let form = document.querySelector('form');

    form.addEventListener('submit', function(event) {

        let errors = [];
        const emailRegex = new RegExp(/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i);
        const phoneRegex = new RegExp(/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g);

        let name = document.querySelector('#name').value.trim();
        let email = document.querySelector('#email').value.trim();
        let phone = document.querySelector('#phone').value.trim();
        let mortgage = document.querySelector('#mortgage').value.trim();

        if (name === '')
            errors.push('Please provide a Name');

        if (email === '')
            errors.push('Please provide a Email Address');

        if (!emailRegex.test(email))
            errors.push('Please provide a valid Email adress');form

        if (phone != '' && !phoneRegex.test(phone))
            errors.push('Please provide a valid Phonenumber');

        if (mortgage === '')
            errors.push('Please select a mortgage');


        // If errors then prevent sending of the form
        if (errors.length > 0) {
            renderErrors(errors);
            event.preventDefault();
        } 
    });

    function renderErrors(errors) {
        let errorList = document.querySelector('#errorList');
        errorList.innerHTML = '';

        errors.forEach(function (element) {
            let errorItem = document.createElement("li");
            errorItem.textContent = element;

            errorList.appendChild(errorItem);
        });
    }
});