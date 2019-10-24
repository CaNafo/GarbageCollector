// Basic Bluetooth sketch HC-05_AT_MODE_01
// Communicate with a HC-05 using the serial monitor
//
// The HC-05 defaults to communication mode when first powered on you will need to manually enter AT mode
// The default baud rate for AT mode is 38400
// See www.martyncurrey.com for details
//
 
 
#include <SoftwareSerial.h>
SoftwareSerial BTserial(2, 3); // RX | TX
// Connect the HC-05 TX to Arduino pin 2 RX. 
// Connect the HC-05 RX to Arduino pin 3 TX through a voltage divider.
// 
 
char c = 'a';
String inData = "";
 
void setup() 
{
    Serial.begin(9600);
    Serial.println("Arduino is ready");
    Serial.println("Remember to select Both NL & CR in the serial monitor");
 
    // HC-05 default serial speed for AT mode is 38400
    BTserial.begin(9600);
    pinMode(4, OUTPUT);
    digitalWrite(4, LOW);
    delay(1000);

    BTserial.write("AT+RENEW\r\n");
    delay(500);
    while (BTserial.available())
      {  
        c = BTserial.read();
        Serial.write(c);
      }
    delay(500);
    while (BTserial.available())
      {  
        c = BTserial.read();
        Serial.write(c);
      }
    BTserial.write("AT+ROLE0\r\n");
    delay(1000);
   
    while (BTserial.available())
      {  
        c = BTserial.read();
        Serial.write(c);
      }        
}
 
void loop()
{
     while (BTserial.available())
      {  
        c = BTserial.read();
        Serial.write(c);
      }
}
