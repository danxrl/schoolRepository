import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Operators implements ActionListener {
  private String Screen = "", monitor1 = "", monitor2 = "", OperationOnScreen = "";
  private JTextField result;
  private boolean CommandEmpty = true, switcher = true;
  private String s[];
  private JButton b[];
  private double R = Integer.MIN_VALUE;

  public Operators(JTextField res, String[] labels, JButton[] btn) {
    result = res;
    s = labels;
    b = btn;
  }

  @Override
  public void actionPerformed(ActionEvent event) {
    for (int i = 0; i <= 9; i++) {
      if (event.getSource() == b[i]) {
        Screen += i;
        result.setText("");
        result.setText(Screen);
      }
    }
    for (int i = 10; i <= 14; i++) {
      if (event.getSource() == b[i]) {
        if (result.getText().lastIndexOf(OperationOnScreen) != -1) {
          result.setText(result.getText().substring(0, result.getText().lastIndexOf(OperationOnScreen)) + s[i]);
        } else {
          result.setText(result.getText() + s[i]);
        }
        OperationOnScreen = s[i];
        if (switcher) {
          monitor1 = s[i];
          switcher = false;
        } else {
          monitor2 = s[i];
          switcher = true;
        }
        if (!monitor1.equals(monitor2) && !monitor2.equals("")) {
          if (switcher) {
            Calc(monitor1.charAt(0), monitor2);
          } else {
            Calc(monitor2.charAt(0), monitor1);
          }
        }
        if (!s[i].equals("=")) {
          Calc(s[i].charAt(0), s[i]);
        }
      }
    }
    if (event.getSource() == b[15]) {
      Screen = "";
      monitor1 = "";
      monitor2 = "";
      switcher = true;
      CommandEmpty = true;
      result.setText("");
    }
  }

  private void Calc(char OpType, String Operator) {
    if (Operator.equals("=")) {
      Operator = "";
    }
    if (CommandEmpty && Screen.equals("")) {
      System.out.println("Nothing...");
    } else if (CommandEmpty && !Screen.equals("")) {
      R = Integer.parseInt(Screen);
      result.setText(Screen + Operator);
      Screen = "";
      CommandEmpty = false;
    } else if (!CommandEmpty && !Screen.equals("")) {
      double l = Integer.parseInt(Screen);
      R = Operations(R, l, OpType);// calculate
      Screen = "";
      result.setText("");
      result.setText(R + Operator);
    }
  }

  private static double Operations(double R, double L, char op) {
    switch (op) {
    case '+':
      return R + L;
    case '-':
      return R - L;
    case '*':
      return R * L;
    case '/':
      return R / L;
    }
    return 0;
  }
}
