<!doctype html>
<html lang="fr">

<head>
  <title>Echiquier</title>
  <style>
    table {
      border-collapse: collapse;
    }

    td {
      width: 50px;
      height: 50px;
      padding: 0;
    }

    .clair {
      background: #FCFAE1;
    }

    .sombre {
      background: #BD8D46;
    }

    .img {
      margin: 0;
      padding: 0;
    }

    #contenu {
      width: 500px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div id="contenu">

    <table>
      <?php
      $ligmax = 8;
      $colmax = 8;
      //vérifie si la variable fen existe dans $_POST, sinon entre une position de base
      $fen = (isset($_POST['fen'])) ? $_POST['fen'] : "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";

      //remplacement des chiffres par des v
      $chiffre = [1, 2, 3, 4, 5, 6, 7, 8];
      $nbrV = ["v", "vv", "vvv", "vvvv", "vvvvv", "vvvvvv", "vvvvvvv", "vvvvvvvv"];
      $fen2 = str_replace($chiffre, $nbrV, $fen);

      echo ($fen2 . "<br>");

      //passe d'une suite de caractères à un tableau
      $pi = explode("/", $fen2);

      //passe d'un tableau de 1 dimension à 2 dimensions
      for ($i = 0; $i < 8; $i++) {
        $piece[$i] = str_split($pi[$i]);
      }

      //Tableau des pièces
      $img = [
        'r' => "tour_n",
        'n' => "cavalier_n",
        'b' => "fou_n",
        'k' => "roi_n",
        'q' => "dame_n",
        'p' => "pion_n",

        'v' => "vide",

        'R' => "tour_b",
        'N' => "cavalier_b",
        'B' => "fou_b",
        'K' => "roi_b",
        'Q' => "dame_b",
        'P' => "pion_b"
      ];

      //créé le cadrillage
      for ($lig = 0; $lig < $ligmax; $lig++) {

        echo "<tr>";

        for ($col = 0; $col < $colmax; $col++) {

          $couleur = (($lig + $col) % 2 == 0) ? "clair" : "sombre";

          //donne le nom de la pièce par rapport au tableau piece
          $pos = $img[$piece[$lig][$col]];

          echo "<td class=\"$couleur\"><img src=\"img/$pos.png\" alt=\"\"></td>";
        }

        echo "</tr>";
      }

      ?>
    </table>


  </div>
  <form method="post" action="Echiquier.php"> <!-- emplacement pour le champ de texte et les bouttons submit -->
    FEN :
    <!-- champ de texte prérempli -->
    <input id="fen" type="text" name="fen" size="60" value="rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR">
    <!-- boutton submit ok -->
    <input type="submit" value="OK">
    <!-- boutton submit position initiale -->
    <input type="submit" value="Pos. initiale">
  </form>
</body>

</html>