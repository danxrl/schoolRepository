import java.awt.*;
import javax.swing.*;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

public class Espiral extends JFrame implements Runnable {
  public Thread hilo;
  public int tope=0;

	public Espiral() {
		super("Espiral");
		setSize(600,600);
		setVisible(true);
	  setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    hilo = new Thread(this);
    hilo.start();
    hilo.run();
	}

  public void run() {
    while (true) {
      for (int i=0; i<100; i++) {
        tope = i;
        repaint();
        try {
          Thread.sleep(1000);
        } catch (Exception e){
          System.out.println(e);
        }
      }
      repaint();
    }
  }

	public void paint(Graphics g) {
    int x = getSize().width / 2;
    int y = getSize().height / 2;
    int width = 10;
    int height = 10;
    int startAngle = 0;
    int arcAngle = 180;
    int depth = 10;
    for (int i = 0; i <tope; i++) {
      g.setColor(Color.BLUE);
      if (i % 2 == 0) {
        g.drawArc(x+5, y, width, height, startAngle, -arcAngle);
      } else {
        g.drawArc(x-5, y, width, height, startAngle, arcAngle);
        x -= 10;
        y -= depth;
        width += 2 * depth;
        height += 2 * depth;
      }
    }
  }
  public static void main(String[] args){
    new Espiral();
  }
}
