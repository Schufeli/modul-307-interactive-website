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
        let risklevel = document.querySelector('#risklevel').value.trim();

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

        if (risklevel === '')
            errors.push('Please select a risklevel');


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

function calculateFinishDate() {
    risklevels = [840, 660, 480, 360, 240];

    let risklevelId = document.querySelector('#risklevel').value.trim();
    let dateOutput = document.getElementById('dateOutput');

    var today = new Date();
    var newdate = new Date();

    newdate.setDate(today.getDate()+risklevels[risklevelId]);

    dateOutput.value = newdate;
}