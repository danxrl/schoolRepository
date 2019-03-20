import java.awt.BasicStroke;
import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Line2D;
import java.awt.image.BufferStrategy;
import static java.lang.Thread.sleep;
import java.util.Calendar;

public class Movimientos implements Runnable {
   private String title;
   private int size;
   private Pantalla display;
   private Thread f;
   private BufferStrategy buffer;
   private Graphics2D g;
   /* private static final float twoPi = (float) (2.0 * Math.PI); */
   private static final float threePi = (float) (3.0 * Math.PI);
   private static final float radPerSecMin = (float) (Math.PI / 30.0);

   public Movimientos(String title, int size) {
      this.title = title;
      this.size = size;
   }

   public void init() {
      display = new Pantalla(title, size);
   }

   public void draw() {
      buffer = display.canvas.getBufferStrategy();

      if (buffer == null) {
         display.canvas.createBufferStrategy(3);
         return;
      }

      int center = size / 2;
      g = (Graphics2D) buffer.getDrawGraphics();
      g.clearRect(0, 0, size, size);

      // draw
      g.setColor(Color.BLUE);
      g.fillOval(10, 10, size - 20, size - 20);
      g.setColor(Color.WHITE);
      g.fillOval(20, 20, size - 40, size - 40);

      // draw numbers
      int angleX, angleY;
      int radius;
      double position;
      /* double time = System.currentTimeMillis(); */
      int horas = 0;
      int minutos = 0;
      int segundos = 0;
      int milis = 0;

      for (int i = 0; i < 12; i++) {
         position = i / 12.0 * Math.PI * 2;
         radius = center - 40;
      }

      for (int i = 1; i <= 60; i++) {
         position = i / 60.0 * Math.PI * 2;
         radius = center - 20;
         angleX = (int) ((center) + (Math.sin(position) * radius));
         angleY = (int) ((center) - (Math.cos(position) * radius));
         if (i == 15 || i == 30 || i == 45 || i == 60) {
            radius = center - 70;
         } else {
            radius = center - 40;
         }
         int angleW = (int) ((center) + (Math.sin(position) * radius));
         int angleZ = (int) ((center) - (Math.cos(position) * radius));
         g.setColor(Color.BLACK);
         g.drawLine(angleW, angleZ, angleX, angleY);

      }

      Calendar now = Calendar.getInstance();
      horas = now.get(Calendar.HOUR);
      minutos = now.get(Calendar.MINUTE);
      segundos = now.get(Calendar.SECOND);
      milis = now.get(Calendar.MILLISECOND);

      int segundero = size / 2;
      int minutero = segundero * 2 / 3;
      int horario = segundero / 2;
      int segundo = center - 50;
      float fSegundos = segundos + (float) milis / 1000;
      float anguloSeg = threePi - (radPerSecMin * fSegundos);

      g.setColor(Color.BLACK);
      dibujaManecilla(g, center, center, anguloSeg, 0, segundo);

      float fminutes = (float) (minutos /* + fSegundos/60.0 */);
      float anguloMinutos = threePi - (radPerSecMin * fminutes);
      g.setColor(Color.DARK_GRAY);
      dibujaManecilla(g, center, center, anguloMinutos, 0, minutero);

      float fhours = (float) (horas /* + fminutes/60.0 */);
      float anguloHoras = threePi - (5 * radPerSecMin * fhours);
      g.setColor(Color.BLUE);
      dibujaManecilla(g, center, center, anguloHoras, 0, horario);

      // center oval
      g.setColor(Color.BLUE);
      g.fillOval(center - 5, center - 5, 10, 10);

      // end
      buffer.show();
      g.dispose();
   }

   private void dibujaManecilla(Graphics g, int x, int y, double angle, int colaManecilla, int puntaManecilla) {
      float seno = (float) Math.sin(angle);
      float coseno = (float) Math.cos(angle);

      int dxmin = (int) (colaManecilla * seno);
      int dymin = (int) (colaManecilla * coseno);

      int dxmax = (int) (puntaManecilla * seno);
      int dymax = (int) (puntaManecilla * coseno);
      Graphics2D g2 = (Graphics2D) g;
      g2.setStroke(new BasicStroke(5));
      g2.draw(new Line2D.Float(x + dxmin, y + dymin, x + dxmax, y + dymax));
   }

   public synchronized void start() {
      f = new Thread(this);
      f.start();
   }

   public synchronized void stop() {
      try {
         f.join();
      } catch (InterruptedException e) {
         e.printStackTrace();
      }
   }

   public void run() {
      init();
      while (true) {
         try {
            sleep(0);
         } catch (InterruptedException e) {
            e.printStackTrace();
         }
         draw();
      }
   }
}
