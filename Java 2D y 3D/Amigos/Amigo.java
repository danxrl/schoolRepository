/**
 * Amigo
 */
public class Amigo {

  Amigo miAmigo;
  String nombre;

  Amigo (String nombre) {
    this.nombre = nombre;
    this.miAmigo = null;
  }

  boolean quieresSerMiAmigo() {
    return (miAmigo == null);
  }

  void decir(String mensaje) {
    System.out.println(nombre + " dice: " + mensaje);
  }

  void saludar(String saludo) {
    System.out.println(saludo);
  }

  void relacionar (Amigo miNuevoAmigo) {
    if (miAmigo == null) {
      // Preguntar si quiere ser mi amigo
      if (miNuevoAmigo.quieresSerMiAmigo()) {
        miAmigo = miNuevoAmigo;
        miAmigo.saludar(nombre + " dice: Hola, mucho gusto, " + miAmigo.nombre);
        decir("Estoy contento poque mi nuevo amigo es " + miAmigo.nombre);
      } else {
        decir(miNuevoAmigo.nombre + " no quiso ser mi amigo");
      }
    } else {
      decir("No puedo tener otro amigo a menos que termine mi amistad con " + miAmigo.nombre);
    }
  }

  void romperAmistad() {
    if (miAmigo != null) {
      miAmigo.yaNoQuieroTuAmistad();
      miAmigo = null;
    } else {
      decir("No pedo terminar una amistad cuando no la tengo");
    }
  }

  void tomarMiAmistad(Amigo miNuevoAmigo) {
    this.miAmigo = miNuevoAmigo;
    miNuevoAmigo.saludar(nombre + " dice: Igualmente, " + miAmigo.nombre + ", mucho gusto");
  }

  void yaNoQuieroTuAmistad() {
    if (miAmigo != null) {
      decir(miAmigo.nombre + " ya no quiere nada conmigo");
      miAmigo = null;
    }
  }
}