/**
 * Amistad
 */
public class Amistad {

  public static void main(String[] args) {
    Amigo hugo = new Amigo("Hugo");
    Amigo paco = new Amigo("Paco");
    Amigo luis = new Amigo("Luis");

    hugo.relacionar(paco);
    luis.relacionar(hugo);

    paco.romperAmistad();

    luis.relacionar(hugo);
  }
}