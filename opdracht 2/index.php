<?php

class BankAccount{
    protected string $bankNummer;
    protected int $balans;

    function __construct(string $bankNummer, int $balans){
        $this->bankNummer = $bankNummer;
        $this->balans = $balans;
    }
    protected function toevoegen(int | float $sumGetal){
        if($sumGetal > 0){
            $this->balans += $sumGetal;
            echo "Je hebt nog " + $this->balans;
        }
        else{
            echo "Voer alstublieft een bedrag in dat meer is dan nul";
        }
        
    }
    protected function onttrekken(int | float $minGetal){

        if($this->balans - $minGetal >= 0){
            $this->balans -= $minGetal;
        }
    }
}

class BankAccountPlus extends BankAccount{
    private int | float $boeteRentePercentage;

    function __construct(int $boeteRentePercentage){
        $this->boeteRentePercentage = $boeteRentePercentage;
    }

    public function boete(){

        if($this->balans < 0){
            $totalBalans = $this->balans / 100 * $this->boeteRentePercentage;
            echo "Je hebt een boete rente van: " + $totalBalans;
        }
    }

}
$bankaccount = new BankAccount("NL80 INGB 1234567", 0);
$bankaccountplus = new BankAccountPlus(3);