<?php
    $mostra_form = true;

    $errore_a = false;
    $errore_b = false;

    $a_input = "";
    $b_input = ""; 

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $a = isset($_POST["a"]) && $_POST["a"] != "" && is_numeric($_POST["a"]) ? floatval($_POST["a"]) : "NOT_VALID";
        $b = isset($_POST["b"]) && $_POST["b"] != "" && is_numeric($_POST["b"]) ? floatval($_POST["b"]) : "NOT_VALID";

        $a_input = $_POST["a"];
        $b_input = $_POST["b"];

        if ($a == "NOT_VALID") {
            $errore_a = true;
        }

        if ($b == "NOT_VALID") {
            $errore_b = true;
        }

        if (isset($_POST["options"])) {
            print_r($_POST["options"]); // print_r serve semplicemente a leggere un array in maniera leggibile
            // Se l'array options è definito posso scorrerlo:
            // Con un for oppure con un for each
    }


        // foreach (($_GET["options"]) as $element) {
        //    echo "<br>" . $element ;
        // }
        if (in_array("absolute", $_POST["options"])) {

        }
    }
    
?>
<?php if ($mostra_form): ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            fieldset {
                margin-top: 20px;
                border-radius: 10px;
            }

            input[type="text"] {
                height: 25px;
                margin-top: 10px;
                width: 150px;
            }

            input[type="radio"], input[type="checkbox"] {
                margin-top: 5px;
                margin-bottom: 5px;
            }

            input[type="submit"] {
                margin-top: 20px;
                height: 25px;
                border-radius: 5px;
            }

            .pagina {
                width: 500px;
                margin-left: auto;
                margin-right: auto;
            }

            .errore { 
                border: 2px solid #B32D2D; 
            }

            .msg-errore { 
                color: #B32D2D; 
                font-size: 13px; 
                margin: 4px 0 0; 
                margin-left: 20px;
            }

        </style>
    </head>
    <body>
        <form action="index.php" method="POST">
            <div class="pagina">

                <h1>Calcolatrice</h1>
                
                <div>
                    <label for="a">a: </label>
                    <input type="text" id="a" name="a" <?php if ($errore_a) { echo 'class="errore"';}?>  value="<?php echo $a_input; ?>" >
                    <?php if ($errore_a): ?>
                        <p class="msg-errore">Valore non valido.</p>
                    <?php endif; ?>
                </div>

                <div>   
                    <label for="b">b: </label>
                    <input type="text" id="b" name="b" <?php if ($errore_b){ echo 'class="errore"'; } ?> value="<?php echo $b_input; ?>">
                    <?php if ($errore_b): ?>
                        <p class="msg-errore">Valore non valido.</p>
                    <?php endif; ?>
                </div>
                
                
                <fieldset>
                    <legend> Operazione </legend>
                    
                
                    <div>
                        <input type="radio" id="somma" name="operazione" value="somma">
                        <label for="somma">Somma</label>
                    </div>

                    <div>
                        <input type="radio" id="differenza" name="operazione" value="differenza">
                        <label for="differenza">Differenza</label>
                    </div>

                    <div>
                        <input type="radio" id="prodotto" name="operazione" value="prodotto">
                        <label for="prodotto">Prodotto</label>
                    </div>

                    <div>
                        <input type="radio" id="quoziente" name="operazione" value="quoziente">
                        <label for="quoziente">Quoziente</label>
                    </div>
                </fieldset>

                <fieldset>
                    <legend> Opzioni </legend>
                    
                    <div>
                        <input type="checkbox" id="assoluto" name="options[]" value="absolute"> <!-- Se mettiamo [] dopo il name, lato php lo verrà trattato come un array-->
                        <label for="assoluto">Valore assoluto</label> <!-- Per collegare label e casella: for del label e id dell'input devono essere uguali -->
                    </div>

                    <div>
                        <input type="checkbox" id="quadrato" name="options[]" value="square">
                        <label for="quadrato">Quadrato</label> 
                    </div>

                    <div>
                        <input type="checkbox" id="arrotonda" name="options[]" value="round">
                        <label for="arrotonda">Arrotonda a 2 decimali</label> 
                    </div>

                </fieldset>
                <div>
                    <input type="submit" value="Calcola">
                </div>
            </div>

        </form>
    </body>
    </html>
<?php else: ?>

<?php endif; ?>