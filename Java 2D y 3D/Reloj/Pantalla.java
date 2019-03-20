import java.awt.Canvas;
import java.awt.Color;
import java.awt.Dimension;
import javax.swing.JFrame;

public class Pantalla {
    public String title;
    public int tamano;
    public JFrame frame;
    public Canvas canvas;

    public Pantalla(String title, int tamano) {
        this.title = title;
        this.tamano = tamano;
        crearPantalla();
    }

    public void crearPantalla() {
        frame = new JFrame(title);
        frame.setSize(tamano, tamano);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setResizable(false);
        frame.setVisible(true);
        canvas = new Canvas();
        canvas.setPreferredSize(new Dimension(tamano, tamano));
        canvas.setBackground(Color.LIGHT_GRAY);
        frame.add(canvas);
        frame.pack();
    }
}