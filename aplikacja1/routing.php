<?php
use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('hello');  // Domyślna strona główna
App::getRouter()->setLoginRoute('login');   // Trasa logowania

// Wyświetlenie głównej strony 
Utils::addRoute('hello',                'HelloCtrl');

// Logowanie do systemu
Utils::addRoute('login',                'LoginCtrl');

// Nie pamiętam hasła 
Utils::addRoute('passwordReset',        'PasswordCtrl');

// Wylogowanie z systemu
Utils::addRoute('logout',               'LogoutCtrl');

// Dodawanie nowego użytkownika 
Utils::addRoute('register',             'RegisterCtrl');

// Wynajem samochodów
Utils::addRoute('rentals',              'RentalsCtrl');

// Wyświetlenie profilu użytkownika
Utils::addRoute('profile',              'ProfileCtrl');

// Zapisywanie zaktualizowanych danych użytkownika 
Utils::addRoute('profileSave',          'ProfileCtrl');

// Wyświetlenie formularza do rejestracji pojazdu
Utils::addRoute('vehicles',             'VehiclesCtrl');

// Wyświetlanie listy pojazdów zarejestrowanych od użytkownika 
Utils::addRoute('vehiclesList',         'VehiclesListCtrl');

// Administrator
Utils::addRoute('adminPanel',           'AdminCtrl');

// Przypisywanie ról przez Administratora 
Utils::addRoute('assignRole',           'AdminCtrl');

// Usuwanie roli przez Administratora
Utils::addRoute('removeRole',           'AdminCtrl');

// Możliwość usunięcia użytkowników przez administratora
Utils::addRoute('deleteUser',           'AdminCtrl');

// Dodawanie nowej roli przez Administratora
Utils::addRoute('roles',                'RolesCtrl');

// Wyświetlanie pojazdów użytkowników przez administratora 
Utils::addRoute('userVehicles',         'UserVehiclesCtrl');

// Panel biurowy dla użytkowniów z rolą pracownik_biurowy
Utils::addRoute('officePanel',          'OfficePanelCtrl');

// Panel do zamawiania części przez pracownik_biurowy
Utils::addRoute('orderPartsOverview',   'OrderPartsOverviewCtrl');

// Panel do rozlczania pojazdów przez pracownik_biurowy
Utils::addRoute('settleVehicles',       'SettleVehiclesCtrl');

// Panel finalizacji + otrzymania całkowitej kowty za naprawę 
Utils::addRoute('finalizeSettlement',   'FinalizeSettlementCtrl');

// Panel warsztatowy dla użytkowników z rolą pracownik_warsztatowy
Utils::addRoute('workshopPanel',        'WorkshopPanelCtrl');

// Panel do wpisywania części potrzebnych od wymiany przez pracownik_warsztatowy 
Utils::addRoute('partsDemand',          'PartsDemandCtrl');

// Usuwanie części z tabeli przez pracownik_warsztatowy
Utils::addRoute('deletePart',           'PartsDemandCtrl');

// Zastosowanie routingu 
Utils::addRoute('paginationDemo',        'PaginationDemoCtrl');







