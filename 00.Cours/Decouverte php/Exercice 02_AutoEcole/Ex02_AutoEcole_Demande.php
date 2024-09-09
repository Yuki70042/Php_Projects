<html>
    <head></head>


    <body>
    <h2> Calculer le prix de votre heure de conduite !</h2>
    <form method="get" action="EX02_AutoEcole_Reponse.php">

        Type de permis : <input type="radio" name="auto_type" value="A" checked> A
                         <input type="radio" name="auto_type" value="B"> B

        <br> <br>

        Jour de la semaine : <select name="auto_jour_semaine">
            <option value="Lundi"> Lundi </option>
            <option value="Mardi"> Mardi </option>
            <option value="Mercredi"> Mercredi </option>
            <option value="Jeudi"> Jeudi </option>
            <option value="Vendredi"> Vendredi </option>
            <option value="Samedi"> Samedi </option>
        </select>

            <br> <br>

        Mutuelle :<input type="radio" name="auto_mutuelle" value="oui" checked> Oui
                  <input type="radio" name="auto_mutuelle" value="non"> Non

            <br> <br>

        <button type="submit" name="auto_button" value="demande"> Envoyer </button>

    </form>
    </body>

</html>