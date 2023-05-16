<?php
class BankAccount {
    protected string $bankNummer;
    protected int $balans;

    public function __construct(string $bankNummer, int $balans) {
        $this->bankNummer = $bankNummer;
        $this->balans = $balans;
    }

    protected function toevoegen(int | float $sumGetal) {
        if ($sumGetal > 0) {
            $this->balans += $sumGetal;
            echo "Je hebt nog " . $this->balans;
        } else {
            echo "Voer alstublieft een bedrag in dat meer is dan nul";
        }
    }

    protected function onttrekken(int | float $minGetal) {
        if ($this->balans - $minGetal >= 0) {
            $this->balans -= $minGetal;
        }
    }
}

class BankAccountPlus extends BankAccount {
    private int | float $boeteRentePercentage;

    public function __construct(int $boeteRentePercentage) {
        $this->boeteRentePercentage = $boeteRentePercentage;
    }

    public function boete() {
        if ($this->balans < 0) {
            $totalBalans = $this->balans / 100 * $this->boeteRentePercentage;
            echo "Je hebt een boete rente van: " . $totalBalans;
        }
    }
}

class UserAccount {
    protected string $name;
    protected string $address;
    protected string $contact;
    protected ?BankAccount $bankAccount;
    protected ?BankAccountPlus $bankAccountPlus;

    public function __construct(string $name, string $address, string $contact) {
        $this->name = $name;
        $this->address = $address;
        $this->contact = $contact;
        $this->bankAccount = null;
        $this->bankAccountPlus = null;
    }
    
    public function createBankAccount(string $bankNummer, int $balans) {
        if ($this->bankAccount === null) {
            $this->bankAccount = new BankAccount($bankNummer, $balans);
            echo "Bankrekening aangemaakt voor gebruiker: " . $this->name;
        } else {
            echo "Gebruiker heeft al een bankrekening";
        }
    }
    
    public function createBankAccountPlus(int $boeteRentePercentage) {
        if ($this->bankAccount === null) {
            echo "Gebruiker moet eerst een normale bankrekening aanmaken voordat hij/zij een plusrekening kan openen";
        } elseif ($this->bankAccountPlus !== null) {
            echo "Gebruiker heeft al een plusrekening";
        } else {
            $this->bankAccountPlus = new BankAccountPlus($boeteRentePercentage);
            echo "Plusrekening aangemaakt voor gebruiker: " . $this->name;
        }
    }
}

$user = new UserAccount("John Doe", "123 Main St", "john@example.com");
$user->createBankAccount("NL80 INGB 1234567", 0);
$user->createBankAccountPlus(3);


// Opgaven Code standaarden..

//Voeg een spatie toe tussen het commentaar-teken (//)
//Eigenschappen (variabelen) moeten in camelCase worden geschreven.
//Gebruik accolades ({}) op een nieuwe regel.
//Classnamen moeten in CamelCase worden geschreven.
//Gebruik Engelse namen voor variabelen, methoden en functies.
//Gebruik een spatie na komma's en operators.
//Gebruik geen underscores (_) in namen, behalve voor constanten.
//Gebruik 4 spaties voor inkepingen in plaats van tabs.


//
//Voeg een spatie toe voor en na een enkele lijn commentaar (#).
//De concatenatie-operator in PHP is een punt (".") en geen plusteken ("+"). Dus de regels


//Regel 4: echo "Je hebt nog " + $this->balans;

//Regel 40: echo "Je hebt een boete rente van: " + $totalBalans;