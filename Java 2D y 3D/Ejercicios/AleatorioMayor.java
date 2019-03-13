/**
 * AleatorioMayor
 */
public class AleatorioMayor {

  public static void main(String[] args) {
    int primero = Integer.parseInt(args[0]);
    int segundo = Integer.parseInt(args[1]);
    int mayor = Math.max(primero, segundo);
    System.out.println("El numero " + mayor + " es el mayor.");
  }
}