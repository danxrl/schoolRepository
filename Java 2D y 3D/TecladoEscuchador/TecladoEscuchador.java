import java.awt.Color;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import javax.swing.JButton;
import javax.swing.JFrame;

public class TecladoEscuchador extends JFrame implements KeyListener {

  private JButton boton;

  public TecladoEscuchador() {
    setLayout(null);
    setTitle("Eventos De Teclado");
    setVisible(true);
    setSize(400, 400);
    setResizable(false);
    setDefaultCloseOperation(EXIT_ON_CLOSE);
    boton = new JButton();
    boton.setBounds(100, 100, 100, 100);
    boton.addKeyListener(this);
    add(boton);
    boton.setForeground(Color.BLACK);
  }

  public void keyPressed(KeyEvent e) {
    boton.setText(String.valueOf(e.getKeyChar()));
  }

  @Override
  public void keyReleased(KeyEvent e) {
    boton.setBackground(Color.BLUE);
  }

  @Override
  public void keyTyped(KeyEvent e) {
    boton.setBackground(Color.GRAY);
  }

  public static void main(String[] args) {
    new TecladoEscuchador();
  }
}