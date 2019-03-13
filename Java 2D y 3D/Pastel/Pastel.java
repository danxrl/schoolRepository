import java.awt.*;
import javax.swing.*;
import java.util.ArrayList;
import java.util.List;
import java.awt.geom.Arc2D;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

public class Pastel extends JFrame{

	public static List<String> lista;
	public static int tamano;
  public List<Integer> lista2;

	public Pastel() {
		super("Grafica De Pastel");
		lista = new ArrayList<String>();
		lista2 = new ArrayList<Integer>();
		setSize(600,600);
		setVisible(true);
	 	setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
  }

  public void paint(Graphics g) {
    Graphics2D g2 = (Graphics2D) g;
    double con = 0;
    double grados = 0;
    double grados1 = 0;
    int pintura = 0;
    int k = 250;
    int strin = 270;
    int y = 1;

    for (int x = 0; x < tamano * 2; x = x + 2 ) {
      int a=Integer.parseInt(lista.get(x));
      lista2.add(a);
    }

    for (int i = 0; i < tamano; i++ ) {
      con += lista2.get(i);
    }

    for (int i = 0; i < tamano; i++ ) {
      grados=lista2.get(i)*360/con;
      g2.setPaint(new Color((int)(Math.random()*255),(int)(Math.random()*255),(int)(Math.random()*255)));
      g2.fill(new Arc2D.Double(50,200,300,300,grados1,grados, Arc2D.PIE));
      g2.fillRect(370,k,20,20);
      g2.drawString(lista.get(y), 400, strin);
      grados1 += grados;
      k += 30;
      strin += 30;
      pintura += 50;
      y += 2;
    }
  }

	public static void main(String[] args) {
		new Pastel();
		for(int x = 0; x < args.length; x++){
			lista.add(x,args[x]);
		}
		tamano=args.length / 2;
	}
}
