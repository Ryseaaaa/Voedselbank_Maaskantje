<?php
  function roletostring($role){
    switch ($role) {
      case '0':
        return "Geen rol";
        break;

      case '1':
        return "Magazijnmedewerker";
        break;
        
      case '2':
        return "Voedselpakket Vrijwilliger";
        break;

      case '3':
        return "Directie";
        break;
      
      default:
        return "Onbekende rol";
        break;
    }

  }
?>