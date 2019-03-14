import javax.swing.*;
import java.awt.*;
import java.awt.event.WindowAdapter;
import java.awt.event.WindowEvent;

public class Calculadora extends Frame {
  private JTextField result = new JTextField();
  private JPanel controls = new JPanel();
  private JButton btn[] = new JButton[16];
  private String labels[] = { "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "+", "-", "/", "*", "=", "C" };
  private Operators op = new Operators(result, labels, btn);

  public Calculadora() {
    super("Calculadora");
    setSize(500, 500);
    setResizable(false);
    fillLayout();
    setVisible(true);
    addWindowListener(new WindowAdapter() {
      public void windowClosing(WindowEvent we) {
        System.exit(0);
      }
    });
  }

  private void fillLayout() {
    result.setEditable(false);
    result.setBackground(Color.white);
    result.setPreferredSize(new Dimension(500, 50));
    result.setHorizontalAlignment(JTextField.RIGHT);
    Font font = new Font("Arial", Font.BOLD, 20);
    result.setFont(font);
    controls.setLayout(new GridLayout(4, 4));
    for (int i = 0; i < 16; i++) {
      btn[i] = new JButton(labels[i]);
      btn[i].setFont(font);
      if (i >= 10) {
        btn[i].setBackground(Color.GRAY);
        btn[i].setForeground(Color.WHITE);
      } else {
        btn[i].setBackground(Color.BLUE);
        btn[i].setForeground(Color.WHITE);
      }
      btn[i].addActionListener(op);
      controls.add(btn[i]);
    }
    add(result, BorderLayout.NORTH);
    add(controls);
  }

  public static void main(String[] args) {
    new Calculadora();
  }
}
