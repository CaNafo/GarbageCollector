// Basic Bluetooth sketch HC-05_AT_MODE_01
// Communicate with a HC-05 using the serial monitor
//
// The HC-05 defaults to communication mode when first powered on you will need to manually enter AT mode
// The default baud rate for AT mode is 38400
// See www.martyncurrey.com for details
//
 
 
#include <SoftwareSerial.h>
#include <String.h>

SoftwareSerial BTserial(2, 3); // RX | TX
// Connect the HC-05 TX to Arduino pin 2 RX. 
// Connect the HC-05 RX to Arduino pin 3 TX through a voltage divider.
// 
 
char c = 'a';
String inData = "";
int smoke = 0;

//za detekciju dima...
int redLed = 12;
int greenLed = 11;
int buzzer = 10;
int smokeA0 = A5;
int sensorThres = 400;

//za distancu...
const int trigPin = 8;
const int echoPin = 9;
long duration;
int distance;

void setup() {

  Serial.begin(9600);
  
  pinMode(trigPin, OUTPUT); 
  pinMode(echoPin, INPUT);
  
  pinMode(redLed, OUTPUT);
  pinMode(greenLed, OUTPUT);
  pinMode(buzzer, OUTPUT);
  pinMode(smokeA0, INPUT);

  bluetooth_master_init();
  
  
}

void loop() {

  
  smoke_detected();

  distance_metter();
  
  
  sendToPC();
  
}

void sendToPC()
{
  BTserial.println(String(distance, DEC));
  delay(300);
  Serial.print(String(distance, DEC));
  Serial.print("\n\r");
  //BTserial.print(smoke);
  //BTserial.print("\n\r");  
  //Serial.print(smoke);
  //Serial.print("\n\r");
  
}

void bluetooth_master_init()
{
   BTserial.begin(9600);
    pinMode(4, INPUT);
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
    BTserial.write("AT+ROLE1\r\n");
    delay(1000);
   
    while (BTserial.available())
      {  
        c = BTserial.read();
        Serial.write(c);
      }
 opet:    BTserial.write("AT+INQ\r\n");
    delay(6000);

    inData = "";
    while (BTserial.available())
      {       
        c = BTserial.read();
        inData+=c;
        /*inData[i] = c; // Store it
        i++; // Increment where to write next
        inData[i] = '\0';*/
      }
    Serial.print(inData);
    
    BTserial.write("AT+CONN1\r\n");
    delay(2000);
    
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
}

void smoke_detected()
{
  int analogSensor = analogRead(smokeA0);
  
  if (analogSensor > sensorThres)
  {
    smoke = 1;
    digitalWrite(greenLed, LOW);
    tone(buzzer, 1000, 200);
  }
  else
  {
    smoke = 0;
    digitalWrite(greenLed, HIGH);
    noTone(buzzer);
  }
  delay(100);
}
void distance_metter()
{
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  // Calculating the distance
  distance= duration*0.034/2;

  if(distance<18)
  {
     digitalWrite(redLed, HIGH);
     return;
  }

  digitalWrite(redLed, LOW);
 
}
