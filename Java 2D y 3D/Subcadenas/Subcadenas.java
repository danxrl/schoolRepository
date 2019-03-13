/**
 * Subcadenas
 */
public class Subcadenas {

  public static void main(String[] args) {
    String valor = args[0];
		int tamanio = valor.length();
		System.out.println("Substrings de: " + valor);
		for(int i = 0; i < tamanio; i++) {
			System.out.println(valor.substring(0, i));
		}
		for (int i = tamanio; i > 0; i--) {
			System.out.println(valor.substring(i,tamanio));
		}
  }
}