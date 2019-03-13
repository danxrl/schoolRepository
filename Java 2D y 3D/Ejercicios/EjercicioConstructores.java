/**
 * EjercicioConstructores
 */
public class EjercicioConstructores {

  int b;
  EjercicioConstructores() {
    b = 12;
  }

  public static void main(String[] args) {
    
    EjercicioConstructores a = new EjercicioConstructores();
    EjercicioConstructores c = a;
    a.b = 15;
    System.out.println(c.b);
  }
}