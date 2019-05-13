import java.awt.*;
import javax.swing.*;
import java.awt.image.BufferedImage;

public class MyGraphics {

  private BufferedImage buffer;
  private JFrame parent;

  public MyGraphics(JFrame parent) {
    this.parent = parent;
    buffer = new BufferedImage(1, 1, BufferedImage.TYPE_INT_RGB);
  }

  public void Pixelx(int x, int y, Color c) {
    buffer.setRGB(0, 0, c.getRGB());
    parent.getGraphics().drawImage(buffer, x, y, parent);
  }

  public void LineaModeloMatematicox(int x1, int y1, int x2, int y2, Color c) {
    if (x1 != x2) {
      int m = ((y2 - y1) / (x2 - x1));
      int b = y1 - m * x1;
      int y;

      if (x1 < x2) {
        while (x1 <= x2) {
          y = m * x1 + b;
          this.Pixelx(x1, (int) Math.ceil(y), c);
          x1++;
        }
      } else if (x1 > x2) {
        while (x2 <= x1) {
          y = m * x2 + b;
          this.Pixelx(x2, (int) Math.ceil(y), c);
          x2++;
        }
      }
    }

    //sino itero con x itero con y
    else if (x1 == x2) {
      if (y1 < y2) {
        while (y1 <= y2) {
          this.Pixelx(x1, y1, c);
          y1++;
        }
      } else if (y1 > y2) {
        while (y2 <= y1) {
          this.Pixelx(x1, y2, c);
          y2++;
        }
      }
    }
  }

  public void LineaDDA(int x1, int y1, int x2, int y2, Color c) {
    //if(x1 < x2) {
    int dx = x2 - x1;
    int dy = y2 - y1;
    int steps = Math.abs(dx) > Math.abs(dy) ? Math.abs(dx) : Math.abs(dy);

    float Xinc = dx / (float) steps;
    float Yinc = dy / (float) steps;

    int X = x1;
    int Y = y1;

    for (int i = 0; i <= steps; i++) {
      Pixelx(X, Y, c); // put pixel at (X,Y)
      X += Xinc; // increment in x at each step
      Y += Yinc; // increment in y at each step
    }
  }

  public void Bresenham(int x1, int y1, int x2, int y2, Color c) {
    if (x1 < x2) {
      int dx = Math.abs(x2 - x1);
      int dy = Math.abs(y2 - y1);

      int X = x1;
      int Y = y1;

      int p = 2 * dy - dx;

      while (X < x2) {
        if (p >= 0) {
          Pixelx(X, Y, c);
          Y = Y + 1;
          p = p + 2 * dy - 2 * dx;
        } else {
          Pixelx(X, Y, c);
          p = p + 2 * dy;
        }
        X = X + 1;
      }
    } else if (x1 > x2) {
      int dx = x1 - x2;
      int dy = y1 - y2;

      int X = x2;
      int Y = y2;

      int p = 2 * dy - dx;

      while (X < x1) {
        if (p >= 0) {
          Pixelx(X, Y, c);
          Y = Y + 1;
          p = p + 2 * dy - 2 * dx;
        } else {
          Pixelx(X, Y, c);
          p = p + 2 * dy;
        }
        X = X + 1;
      }
    } else {
      if (y1 < y2) {
        int dy = y2 - y1;

        int X = x2;
        int Y = y1;

        int p = 2 * dy;

        while (Y < y2) {
          if (p >= 0) {
            Pixelx(X, Y, c);
            p = p + 2 * dy;
          } else {
            Pixelx(X, Y, c);
            p = p + 2 * dy;
          }
          Y = Y + 1;
        }
      } else if (y1 > y2) {
        int dy = y1 - y2;

        int X = x2;
        int Y = y2;

        int p = 2 * dy;

        while (Y < y1) {
          if (p >= 0) {
            Pixelx(X, Y, c);
            p = p + 2 * dy;
          } else {
            Pixelx(X, Y, c);
            p = p + 2 * dy;
          }
          Y = Y + 1;
        }
      }
    }
  }


  public void PuntoMedio(int x1, int y1, int x2, int y2, Color c) {
    int pk, A, B, pxlx, pxly;

    int dx = (x2 - x1);
    int dy = (y2 - y1);

    if (dy < 0) {
      dy = -dy;
      pxly = -1;
    } else {
      pxly = 1;
    }
    if (dx < 0) {
      dx = -dx;
      pxlx = -1;
    } else {
      pxlx = 1;
    }

    int X = x1;
    int Y = y1;
    Pixelx(x1, y1, c);

    if (dx > dy) {
      pk = 2 * dy - dx;
      A = 2 * dy;
      B = 2 * (dy - dx);
      while (X != x2) {
        X = X + pxlx;
        if (pk < 0) {
          pk = pk + A;
        } else {
          Y = Y + pxly + 1 / 2;
          pk = pk + B;
        }
        Pixelx(X, Y, c);
      }
    } else {
      pk = 2 * dx - dy;
      A = 2 * dx;
      B = 2 * (dx - dy);
      while (Y != y2) {
        Y = Y + pxly + 1 / 2;
        if (pk < 0) {
          pk = pk + A;
        } else {
          X = X + pxlx;
          pk = pk + B;
        }
        Pixelx(X, Y, c);
      }
    }
  }

  public void Cuadradox(int x1, int y1, int x2, int y2, Color c) {
    PuntoMedio(x1, y1, x2, y1, c);
    PuntoMedio(x1, y1, x1, y2, c);
    PuntoMedio(x2, y1, x2, y2, c);
    PuntoMedio(x1, y2, x2, y2, c);
  }

  public void Cartecianasx(int xc, int yc, int r, Color c) {
    for (int x = -r; x <= r; x++) {
      int y = (int)(Math.sqrt(r * r - x * x) + .5);
      Pixelx(xc + x, yc + y, c); //abajo
      Pixelx(xc + x, yc - y, c); //arriba
    }
  }

  public void Polaresx(int xc, int yc, int r, Color c) {
    for (double t = 0; t <= Math.PI * 2; t = t + .01) {
      int x = (int)(xc + r * Math.sin(t));
      int y = (int)(yc + r * Math.cos(t));
      Pixelx(x, y, c);
      //System.out.println(t);
    }
  }

  public void SimetriaDeOchosLados(int xc, int yc, int r, Color c) {
    int x, y;
    double yr;
    x = 0;
    y = r;
    yr = r;
    Pixelx(xc + x, yc + y, c);
    while (x < yr) {
      x = x + 1;
      yr = Math.sqrt(r * r - x * x);
      y = (int) Math.round(yr);
      Pixelx(xc + x, yc + y, c); //primera linea abajo hacia der
      Pixelx(xc - x, yc + y, c); //primera linea abajo hacia izquierda
      Pixelx(xc + x, yc - y, c); //primera linea arriba hacia der
      Pixelx(xc - x, yc - y, c); //primera linea arriba hacia izquierda
      Pixelx(xc + y, yc + x, c); //segunda linea abajo hacia der
      Pixelx(xc - y, yc + x, c); //segunda linea abajo hacai izquierda
      Pixelx(xc + y, yc - x, c);
      Pixelx(xc - y, yc - x, c);
    }
  }

  public void PuntoMedioCirculo(int xc, int yc, int r, Color c) {

    int p0 = 5 / 4 - r; //p0=5/4–R//siResentero,p0=1-r

    Pixelx(0, r, c);
    for (int x = 0; x < r; x++) {
      if (p0 < 0)
        p0 = p0 + 2 * x + 1;
      else {
        r = r - 1;
        p0 = p0 + 2 * (x - r) + 1;
      }
      Pixelx(xc + x, yc + r, c); //primera linea abajo hacia der
      Pixelx(xc - x, yc + r, c); //primera linea abajo hacia izquierda
      Pixelx(xc + x, yc - r, c); //primera linea arriba hacia der
      Pixelx(xc - x, yc - r, c); //primera linea arriba hacia izquierda
      Pixelx(xc + r, yc + x, c); //segunda linea abajo hacia der
      Pixelx(xc - r, yc + x, c); //segunda linea abajo hacai izquierda
      Pixelx(xc + r, yc - x, c);
      Pixelx(xc - r, yc - x, c);
    }
  }

  public void BresenhamCirculo(int xc, int yc, int r, Color c) {
    int x = -r;
    int y = 0;
    int err = 2 - 2 * r;

    do {
      Pixelx(xc - x, yc + y, c); //abajo hacia derecha
      Pixelx(xc - y, yc - x, c); //abajo hacia izquierda
      Pixelx(xc + x, yc - y, c); //arriba hacia la izquierda
      Pixelx(xc + y, yc + x, c); //arriba hacia la derecha
      r = err;
      if (r > x)
        err += ++x * 2 + 1; /* e_xy+e_x > 0 */
      if (r <= y)
        err += ++y * 2 + 1; /* e_xy+e_y < 0*/
    } while (x < 0);
  }

  //este ovalo se rellena solo
  public void OvaloxRelleno(int xc, int yc, int height, int width, Color c) {
    for (int y = -height; y <= height; y++) {
      for (int x = -width; x <= width; x++) {
        double dx = (double) x / (double) width;
        double dy = (double) y / (double) height;
        if (dx * dx + dy * dy <= 1)
          Pixelx(xc + x, yc + y, c);
      }
    }
  }

  public void Ovalox(int xc, int yc, int height, int width, Color c) {
    int a2 = width * width;
    int b2 = height * height;
    int fa2 = 4 * a2, fb2 = 4 * b2;
    int x, y, sigma;

    /* first half */
    for (x = 0, y = height, sigma = 2 * b2 + a2 * (1 - 2 * height); b2 * x <= a2 * y; x++) {
      Pixelx(xc + x, yc + y, c);
      Pixelx(xc - x, yc + y, c);
      Pixelx(xc + x, yc - y, c);
      Pixelx(xc - x, yc - y, c);
      if (sigma >= 0) {
        sigma += fa2 * (1 - y);
        y--;
      }
      sigma += b2 * ((4 * x) + 6);
    }

    /* second half */
    for (x = width, y = 0, sigma = 2 * a2 + b2 * (1 - 2 * width); a2 * y <= b2 * x; y++) {
      Pixelx(xc + x, yc + y, c);
      Pixelx(xc - x, yc + y, c);
      Pixelx(xc + x, yc - y, c);
      Pixelx(xc - x, yc - y, c);
      if (sigma >= 0) {
        sigma += fb2 * (1 - x);
        x--;
      }
      sigma += a2 * ((4 * y) + 6);
    }
  }
}