import java.lang.Math;

/**
 * MayorAleatorio
 */
public class MayorAleatorio {

  public static void main(String[] args) {
    int numero1 = (int)Math.floor(Math.random()*100);
    int numero2 = (int)Math.floor(Math.random()*100);

    if (numero1 < numero2) {
      System.out.println("El numero mayor es el " + numero2);  
    } else {
      System.out.println("El numero mayor es el " + numero1);  
    }

    System.out.println("Los numeros aleatorios creados fueron el " + numero1 + " y " + numero2);
  }
}