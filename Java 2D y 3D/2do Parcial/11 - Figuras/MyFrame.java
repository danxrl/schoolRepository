import java.awt.*;
import javax.swing.*;
import java.awt.image.BufferedImage;

public class MyFrame extends JFrame {

  private MyGraphics MyGraphicsInstance;
  private Boolean checkExistance = Boolean.FALSE;

  private BufferedImage buffer;
  public JPanel myJPanel;

  public MyFrame() {
    super("Figuras");
    setSize(500, 500);
    setLocationRelativeTo(null);
    //setResizable(false);
    setVisible(true);
    setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    myJPanel = new JPanel();
    add(myJPanel);
    setVisible(true);
    MyGraphicsInstance = new MyGraphics(this);
  }

  public void paint(Graphics g) {
    if (checkExistance == Boolean.FALSE) {
      buffer = new BufferedImage(1, 1, BufferedImage.TYPE_INT_RGB);

      buffer.setRGB(0, 0, Color.blue.getRGB());
      this.getGraphics().drawImage(buffer, getWidth() / 2, getHeight() / 2, this);

      checkExistance = Boolean.TRUE;
      super.paint(g);
    }
    super.paint(g);
    this.update(g);
  }

  public void update(Graphics g) {

    MyGraphicsInstance.Cuadradox(380, 380, 480, 430, Color.blue);
    MyGraphicsInstance.Cuadradox(400, 400, 440, 420, Color.red);

    MyGraphicsInstance.Ovalox(350, 300, 20, 50, Color.blue);
    MyGraphicsInstance.Ovalox(350, 300, 40, 100, Color.red);
    MyGraphicsInstance.Ovalox(350, 300, 60, 150, Color.green);

    MyGraphicsInstance.BresenhamCirculo(100, 400, 40, Color.blue);
    MyGraphicsInstance.BresenhamCirculo(100, 400, 60, Color.red);
    MyGraphicsInstance.BresenhamCirculo(100, 400, 80, Color.green);

    MyGraphicsInstance.PuntoMedio(40, 40, 100, 100, Color.blue);
    MyGraphicsInstance.PuntoMedio(100, 80, 200, 80, Color.red);
    MyGraphicsInstance.PuntoMedio(300, 40, 200, 100, Color.green);
    MyGraphicsInstance.PuntoMedio(350, 80, 420, 80, Color.black);
  }
}