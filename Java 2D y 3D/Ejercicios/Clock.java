/**
 * Clock
 */
public class Clock {

  int hour;
  Clock() {
    hour = 12;
  }
  Clock(int hour){
    this.hour = hour;
  }

  public static void main(String[] args) {
    Clock c1 = new Clock();
    Clock c2 = new Clock(13);
    c1 = c2;
    System.out.println(c1.hour);
  }
}