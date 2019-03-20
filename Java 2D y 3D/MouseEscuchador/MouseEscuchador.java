import java.awt.Color;
import java.awt.GridLayout;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class MouseEscuchador  extends JFrame implements MouseListener {
  public JLabel label;

  public MouseEscuchador() {
    setTitle( "Eventos De Mouse" );
    setResizable(false);
    setLocationRelativeTo(null);
    setVisible(true);
    setSize(400, 400 );
    setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
    label = new JLabel();
    label.setBounds(100,100, 600, 600);
    label.addMouseListener(this);
    add(label);
    label.setForeground(Color.BLACK);
  }

  public void mouseClicked(MouseEvent evento) {
    label.setText("FUE PRESIONADO");
  }

  public void mouseEntered(MouseEvent evento) {
    label.setText("SOBRE EL EVENTO " );
  }

  @Override
  public void mousePressed(MouseEvent e) {
    if (e.getButton() == 1) { label.setText("CLICK IZQUIERDO!"); }
	  else if (e.getButton() == 2) { label.setText("SCROLL"); }
	  else if (e.getButton() == 3){ label.setText("CLICK DERECHO!"); }
  }

  @Override
  public void mouseReleased(MouseEvent e) {
    label.setText("MOUSE LIBERADO");
  }

  @Override
  public void mouseExited(MouseEvent e) {
    label.setText("FUERA DEL EVETO ");
  }
  public static void main(String[] args) {
    new MouseEscuchador();
  }
}