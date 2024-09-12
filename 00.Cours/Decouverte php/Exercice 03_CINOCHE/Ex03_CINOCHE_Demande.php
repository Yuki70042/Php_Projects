<html>

    <head>

    </head>

    <body>

    <h1>Cinoche</h1>

    <h4>Tarif</h4>
    <form method="post" action="Ex03_CINOCHE_Reponse.php">
        Jour de la semaine : <select name="jour_semaine">
            <option value="1">Lundi</option>
            <option value="2">Mardi</option>
            <option value="3">Mercredi</option>
            <option value="4">Jeudi</option>
            <option value="5">Vendredi</option>
            <option value="6">Samedi</option>
            <option value="7">Dimanche</option>
        </select>

        <br> <br>

        Heure : <input type="time" name="time">

        <br> <br>

        Type de ticket : <input type="radio" name="type_tarif" value="1" checked>  Plein Tarif : 8,70 Euros <br>
        Type de ticket : <input type="radio" name="type_tarif" value="2" >  Etudiant ou mineur : 5,90 Euros <br>
        Type de ticket : <input type="radio" name="type_tarif" value="3" >  Tarif reduit autre : 6,90 euros <br>
        Type de ticket : <input type="radio" name="type_tarif" value="4" >  Tarif special CE : 5,20 Euros <br>

        <br>

        <input type="checkbox" name="Film_3D"> Majoration Film 3D : 1,50 Euro <br>
        <input type="checkbox" name="Coupon"> Coupon reduction : - 1 Euro <br>

        <br>

        <input type="submit" name="Price_button" value="Decouvrir le prix de ma place">
    </form>

    </body>

</html>