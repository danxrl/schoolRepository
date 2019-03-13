import java.util.Arrays;

/**
 * OrdenarNumeros
 */
public class OrdenarNumeros {

  public static void main(String[] args) {
    int numeros[];
    numeros = new int[args.length];
    for(int i = 0; i < args.length; i++) {
      try {
        numeros[i] = Integer.parseInt(args[i]);
      } catch (Exception e) {
        System.out.println("***********************************");
        System.out.println("*** Introduce solamente numeros ***");
        System.out.println("***********************************");
        System.exit(1);
      }
    }
    Arrays.sort(numeros);
    for(int i = 0; i < numeros.length; i++) {
      System.out.print(numeros[i] + " ");
    }
  }
}