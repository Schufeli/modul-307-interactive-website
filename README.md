# Hypothekarbank «HippiBank»

## Team Komax
- *Alessio Vangelisti* [xAlessio](https://github.com/xAlessio)
- *Simon Schaufelberger* [Schufeli](https://github.com/Schufeli)


## Aufgabenstellung
Die Hypothekarbank «HippiBank» ist an eure Webagentur herangetreten und möchte ihre internen Abläufe für den Verleih von Hypotheken vereinfachen. Dazu soll ein Hypotheken-Webtool entwickelt werden, mit dem der Verleih von Hypotheken verwaltet werden kann. Das Tool wird nur von internen Mitarbeitern verwendet. Es muss kein Login- oder Registrierungssystem vorhanden sein da das Tool vorerst nicht direkt vom Kunden verwendet wird.

In den Grundzügen soll das Tool folgende Aufgaben übernehmen:

1. Neue Hypotheken-Verleihe sollen erfasst werden können.
2. Bestehende Hypotheken-Verleihe sollen übersichtlichen angezeigt werden können.
3. Bestehende Hypotheken-Verleihen sollen mutiert werden können.

## Sitemap
| Titel | Route (URL) | Description |
| :--- | :--- | :--- |
| Dashboard | /dashboard | Ist die "Hauptseite" welche die übersicht aller Hypoteken und funktionen anzeigt | 
| Create | /create | Seite welche dazu dient, neue einträge in die Datenbank / Liste einzutragen |
| Update| /update | Seite welche dazu dient, bestehende einträge anzupassen |
| Confirm | /confirm | Seite welche aufgerufen wird, sobald ein Datensatz entfernt werden soll. Somit können wir versehentliches löschen vorzubeugen. |
