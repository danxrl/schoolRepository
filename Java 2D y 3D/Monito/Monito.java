import java.awt.*;
import javax.swing.*;

/**
 * Monito
 */
public class Monito extends JFrame {

  public Monito() {
    super("Uso de graficos");
    this.setSize(200, 300);
    this.setVisible(true);
    this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
  }

  public void paint(Graphics g) {
    g.drawString("Demo de Graficos", 30, 50);
    //carita
    g.drawArc(50, 60, 50,50, 0, 360);
    g.drawArc(60, 70, 30, 30, 180, 180);
    g.fillOval(65,75,5, 5);
    g.fillOval(80, 75, 5, 5);
    //cuerpo
    g.drawLine(75,110,75,200);
    //brazos
    g.drawLine(75,120,45,160);
    g.drawLine(75,120,105,160);
    //piernitas
    g.drawLine(75,200,45,240);
    g.drawLine(75,200,105,240);
  }

  public static void main(String[] args) {
    new Monito();
  }
}