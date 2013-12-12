package com.example.sipepeamoeba;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Pencarian_lokasi extends Activity implements OnClickListener {
	private final Context CONTEXT = this;
	private Button cari,upload,btnShowLocation;
	private EditText editcari;
	GPSTracker gps;
	protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.pencarian_lokasi);
        
        btnShowLocation = (Button) findViewById(R.id.btnShowLocation);
        editcari = (EditText)findViewById(R.id.editcari);
        upload = (Button)findViewById(R.id.btnUpload);
        
        btnShowLocation.setOnClickListener(this);
        upload.setOnClickListener(this);
        
    }
	
	
	
	
	@Override
	public void onClick(View v) {
		// TODO Auto-generated method stub
		if(v == upload) {
			Intent go = new Intent(CONTEXT, Upload_foto.class);
			super.startActivity(go);
		
		}
		else if(v == btnShowLocation){
			
			gps = new GPSTracker(this);
			
			// check if GPS enabled		
	        if(gps.canGetLocation()){
	        	
	        	double latitude = gps.getLatitude();
	        	double longitude = gps.getLongitude();
	        	
	        	// \n is for new line
	        	editcari.setText("lat:" + latitude);
	        	Toast.makeText(getApplicationContext(), "Your  is - \nLat: " + latitude + "\nLong: " + longitude, Toast.LENGTH_LONG).show();	
	        	//Toast.makeText(getApplicationContext(), "Your Location is - \nLat: " + latitude + "\nLong: " + longitude, Toast.LENGTH_LONG).show();	
	        }else{
	        	// can't get location
	        	// GPS or Network is not enabled
	        	// Ask user to enable GPS/network in settings
	        	gps.showSettingsAlert();
	        }
		}
			
	}
}
