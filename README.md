## Laravel Auth

Ciao ragazzi,
creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina.
// PROCEDURE PER AUTH
----- Creazione progetto -----

1. entra nella cartella cd laravel-auth
2. Scaricare Breeze composer require laravel/breeze --dev
3. installare breeze php artisan breeze:install
4. installare il pacchetto di Pacifici composer require pacificdev/laravel_9_preset
5. installare php artisan preset:ui bootstrap --auth
per mac modificare il file config
---- Sviluppo --------

1. Creare il DB OK
2. Fare la migration OK
3. Nelle view aggiungere le cartelle guest e admin OK
4. customizzate il layout guest e aggiungere la view home in view/guest OK
5. creare il controller Guest/PageController che in index restituisce la view guest.home. php artisan make:controller Guest/PageController OK
6. Aggiornare la rotta home OK 
7. Creare il layout admin.blade OK
8. Creare il Admin/DashboardController chi in index punta alla view admin.home che estende il layout admin OK
9. Raggruppare le rotte admin protette da Middleware impostando prefisso e nome OK
10. Creare la rotta admin/home che punta a DashboardController@index OK
11. Modificare RouteServiceProvider in modo che la rotta admin di default sia ‘/admin’ OK
12. Nell’header del layout admin collegare la home della dashboard, la home pubblica, mettere il nome dell’utente loggato e il bottone funzionante logout OK
    
    BONUS
    Creazione del modello `Project` con relativa migrazione, seeder, controller e rotte e stampare la index dei progetti (protetta da middleware)
