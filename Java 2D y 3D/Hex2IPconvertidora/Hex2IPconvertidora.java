/**
 * Hex2IPconvertidora
 */
public class Hex2IPconvertidora {

  Hex2IPconvertidora() {}

  private static void _error() {
    System.out.print("Error");
  }

  public static void main(String[] args) {

    Hex2IPconvertidora a = new Hex2IPconvertidora();

    switch (args[0]) {
      case "-ip":
        a._toIp(args[1]);
        break;

      case "-hex":
        a._toHex(args[1]);
        break;

      default:
        System.out.print("Comando no reconocido");
        break;
    }
  }

  private void _toHex(String ip) {
    if (ip.length() != 8) { _error(); } else {
      String decimal = "";
      for(int  i = 0; i < 4; i++) {
        int inicio = i * 2;
        int fin = (i + 1) * 2;
        String hex = ip.substring(inicio, fin);
        try {
          int valor = Integer.parseInt(hex, 16);
          if (i == 3) {
            decimal = decimal + valor;
            System.out.println(decimal);
          } else { decimal = decimal + valor + "."; }
        } catch (Exception e) {
          _error();
          break;
        }
      }
    }
  }

  private void _toIp(String ip) {
    String hexadecimal = "";
    int valor;
    String[] aux = ip.split("\\.");
    for(int i = 0; i < 4; i++) {
      try {
        valor = Integer.parseInt(aux[i]);
        if (valor < 256) {
          String hexa = Integer.toHexString(valor);
          if (hexa.length() == 1) { hexa = "0" + hexa; }
          hexadecimal = hexadecimal + hexa;
          if (i == 3) {
            System.out.print(hexadecimal.toUpperCase());
          }
        } else { _error(); }
      }
      catch (Exception e) { _error(); }
    }
  }
}