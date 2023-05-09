# m8-prog-opdracht1


**Vraag 1**:
```
SELECT COUNT(employees) FROM employees
```
**vraag 2**:
```
SELECT locations.city, COUNT(departments.department_id) AS num_departments
FROM locations
LEFT JOIN departments ON locations.location_id = departments.location_id
GROUP BY locations.city;
```

**vraag 3**:


a:
```
error_reporting() 
```

b:
```
error_log()
```

**Vraag 4**:

a
```
function keer_om($input) 

 { $output = strrev($input);  

return $output; } 

echo keer_om("Invoer string");
```

b
```
function reverse_case($string) { 

    return strrev(strtoupper($string) ^ strtolower($string) ^ $string); 

} 
```

**Vraag 5**:

a
```

function is_string_or_array($input)  

{ if (is_string($input)) 

 { echo "De invoer is een string."; }  

elseif (is_array($input))  

{ echo "De invoer is een array."; }  

else { echo "De invoer is geen string en geen array."; } } 
```
b
```
function reverse_array($arr) { 

  $output = array(); 

  for ($i = count($arr) - 1; $i >= 0; $i--) { 

    array_push($output, $arr[$i]); 

  } 

  return $output; 

}

```
C
```
function reverse_input($input) {
    if (is_string($input)) {
        return reverse_string($input);
    } elseif (is_array($input)) {
        return reverse_array($input);
    } else {
        return "Input is not a string or an array.";
    }
}

$input1 = 'Dit is een string';
$input2 = [1, 2, 3];
$input3 = 123;
$output1 = reverse_input($input1);
$output2 = reverse_input($input2);
$output3 = reverse_input($input3);
echo $output1 . "\n"; // geeft "gnirts nee si tiD"
print_r($output2); // geeft Array ( [0] => 3 [1] => 2 [2] => 1 )
echo $output3 . "\n"; // geeft "Input is not a string or an array."
```

**Vraag 6**:

a
```
$voornaam = array("Piet", "Jan", "Simon", "Jeroen", "Nick", "Frits", "Daniel", "Erik", "Tess", "Finn"); 
```

b:
```
function zoek_naam($naam, $voornaam) {
    $gevonden_positie = array_search(strtolower($naam), array_map('strtolower', $voornaam));
    if ($gevonden_positie !== false) {
        return $gevonden_positie;
    } else {
        return -1;
    }
}

```
c
```
$voornaam = array("Piet", "Jan", "Simon", "Jeroen", "Nick", "Frits", "Daniel", "Erik", "Tess", "Finn"); 

$naam = "Nick";
$positie = zoek_naam($naam, $voornamen);

if ($positie !== -1) {
    echo "De naam $naam staat op positie $positie in de array.";
} else {
    echo "De naam $naam staat niet in de array.";
}
```
**Vraag 7**:
```
class Bankrekening { 

  private $banknummer; 

  private $saldo; 

  

  public function __construct($banknummer, $saldo = 0) { 

    $this->banknummer = $banknummer; 

    $this->saldo = $saldo; 

  } 

  

  public function storten($bedrag) { 

    $this->saldo += $bedrag; 

  } 

  

  public function opnemen($bedrag) { 

    if ($bedrag > $this->saldo) { 

      echo "Onvoldoende saldo op rekening " . $this->banknummer . "<br>"; 

    } else { 

      $this->saldo -= $bedrag; 

    } 

  } 

  

  public function getSaldo() { 

    return $this->saldo; 

  } 
} 
```
**Vraag 8**:
```
class BankrekeningPlus extends Bankrekening { 

  private $limiet = -1000; // Limiet voor negatief saldo 

  

  // Override van de withdraw methode om geld op te kunnen nemen tot aan de limiet 

  public function withdraw($bedrag) { 

    if ($this->saldo - $bedrag >= $this->limiet) { 

      $this->saldo -= $bedrag; 

      return true; 

    } else { 

      return false; 

    } 

  } 

  

  // Methode om het boete bedrag te berekenen 

  public function berekenBoete() { 

    if ($this->saldo < 0) { 

      $boeteBedrag = abs($this->saldo) * 0.05; // 5% rente voor negatief saldo 

      return $boeteBedrag; 

    } else { 

      return 0; 

    } 

  } 

  

  // Methode om saldo, boete bedrag en datum/tijd van de berekening weer te geven 

  public function toonOverzicht() { 

    $datum = date("Y-m-d H:i:s"); // Huidige datum/tijd 

    $boeteBedrag = $this->berekenBoete(); 

    echo "Saldo: " . $this->saldo . " EUR<br>"; 

    echo "Boete bedrag: " . $boeteBedrag . " EUR<br>"; 

    echo "Datum/tijd: " . $datum; 

  } 

} 
```
**Vraag 9**:

a:
```
declare(strict_types=1);

class Product {
    public function __construct(
        private string $naam,
        private string $beschrijving,
        private int $prijs
    ) {}

    public function setName(string $naam): void {
        $this->naam = $naam;
    }

    public function getName(): string {
        return $this->naam;
    }
}
```
b. 

Het is niet nodig om properties voor naam, beschrijving en prijs aan te maken omdat de constructor al deze properties aanmaakt en initialiseert bij het instantiëren van een nieuw Product-object. Door de private-keyword te gebruiken bij de parameters van de constructor worden deze automatisch als properties aangemaakt. Hierdoor hoeven de properties niet apart aangemaakt te worden in de class body. 

