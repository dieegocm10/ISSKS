class Konprobatzailea{  //Erregistratzerakoan sartzerakoan sartzen diren datuen formatoa ondo dagoela konprobatzeko

  static konprobatuTelefonoa(telf){  //Telefonoa 9 zenbaki soilik badaukan konprobatzeko
    if (telf.value.length!=9) return false;
    else return true;
  }


  static konprobatuEmail(email){  //Email adibidea@zerbitzaria.extentsioa formatua badaukan konprobatzeko
    var formatua= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;  //Email-en formatoa
    if (formatua.test(email.value)) return true;
    else return false;
  }


  static konprobatuDni(dni){  //11111111-Z formatua soilik daukan eta letra zenbakiei dagokiola konprobatzeko
    if (dni.value.length!=9) return false;
    else{
      var hizkia = dni.value.substring(8, 9);  //Hizkia lortzeko
      var zenbakiak = dni.value.substring(0,8);  //Zenbakiak lortzeko
      var hizkiak = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
      if (hizkia != hizkiak[zenbakiak %23]) return false;   //Dni-ko hizkia desegokia bada
      else if (zenbakiak != /[0-9]{8}/) return false;  //Dni-ko lehenengo 8 karaktereak zenbakiak ez badira
      else return true;
    }
  }
}
