package com.example.sipepeamoeba;


import java.text.DecimalFormat;
import java.util.Timer;
import java.util.TimerTask;
import java.util.zip.Checksum;

import org.json.JSONException;
import org.json.JSONObject;


import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.Editable;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import library.DatabaseHandler;
import library.UserFunctions;

public class Utama extends Activity {
	UserFunctions userFunctions;
	Button btnLogout,btnShowLocation,btnUpload;
	EditText id;
	private final Context CONTEXT = this;
	public GPSTracker gps;
	
	private TextView loginErrorMsg,tx_lokasi_cust,tx_lokasi_ptgs;
	// JSON Respon Nama Nodes
	private static String KEY_SUCCESS = "success";
	private static String KEY_ERROR = "error";
	private static String KEY_ERROR_MSG = "error_msg";
	private static String KEY_ID = "id";
	private static String KEY_LATITUTE = "latitute";
	private static String KEY_LONGITUDE = "longitude";
	private static Double CEK_LATITUTE = 0.00;
	private static Double CEK_LONGITUDE = 0.00;
	private static String KEY_NAMA = "nama";
	private static Double latitute = 0.00;
	private static Double longitude = 0.00;
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        // Cek status login di database
        userFunctions = new UserFunctions();
        if(userFunctions.isUserLoggedIn(getApplicationContext())){
        	setContentView(R.layout.pencarian_lokasi);
        	btnLogout = (Button) findViewById(R.id.btnLogout);
        	btnShowLocation = (Button)findViewById(R.id.btnShowLocation);
        	btnUpload = (Button)findViewById(R.id.btnUpload);
        	id = (EditText)findViewById(R.id.editcari);
        	
        	tx_lokasi_cust = (TextView)findViewById(R.id.tx_lokasi_cust);
        	tx_lokasi_ptgs = (TextView)findViewById(R.id.tx_lokasi_ptgs);
        	
        	gps = new GPSTracker(CONTEXT);
        	
        	
        	
        	//Declare the timer
        	Timer t = new Timer();
        	//Set the schedule function and rate
        	t.scheduleAtFixedRate(new TimerTask() {
				
				@Override
				public void run() {
					// TODO Auto-generated method stub
					runOnUiThread(new Runnable() {

		        	    @Override
		        	    public void run() {
		        	    	if(gps.canGetLocation()){
		        	        	check_gps();
		        	        }else{
		        	        	gps.showSettingsAlert();
		        	        }
		        	    }
		        	     
		        	});
				}
			}, 0, 1000);
        	
        	
        	btnLogout.setOnClickListener(new View.OnClickListener() {
    			public void onClick(View arg0) {
    				// TODO Auto-generated method stub
    				userFunctions.logoutUser(getApplicationContext());
    				Intent login = new Intent(getApplicationContext(), Login.class);
    	        	login.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
    	        	startActivity(login);
    	        	// tutup pencarian lokasi
    	        	finish();
    			}
    		});
        	
            btnShowLocation.setOnClickListener(new View.OnClickListener() {
    			@Override
    			public void onClick(View v) {
    				String kirimid = id.getText().toString();        
    				new MyAsyncTask().execute(kirimid);
    				
    			}
    		});
            
            btnUpload.setOnClickListener(new View.OnClickListener() {
				
				@Override
				public void onClick(View v) {
					// TODO Auto-generated method stub
					if(gps.canGetLocation()){
						check_gps();
						//Toast.makeText(getApplicationContext(), latitute.compareTo(CEK_LATITUTE) + " " + longitude.compareTo(CEK_LONGITUDE) + " " + CEK_LATITUTE + " " + CEK_LONGITUDE, Toast.LENGTH_LONG).show();
			        	
			        	if(latitute.compareTo(CEK_LATITUTE) == 1 || longitude.compareTo(CEK_LONGITUDE) == 1){
			        		Toast.makeText(getApplicationContext(), "Lokasi anda dan lokasi customer belum tepat", Toast.LENGTH_LONG).show();
			        	}
			        	else{
			        		Intent upload_foto = new Intent(getApplicationContext(), Upload_foto.class);
			            	upload_foto.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
			            	upload_foto.putExtra("id_cust",  id.getText().toString());
			            	startActivity(upload_foto);
			            	
			        	}
			        }else{
			        	gps.showSettingsAlert();
			        }
				}
			});
            
            if(gps.canGetLocation()){
            	check_gps();
	        }else{
	        	gps.showSettingsAlert();
	        }
            
            
            
        }else{
        	// apabila status tidak login muncul ke halaman login
        	Intent login = new Intent(getApplicationContext(), Login.class);
        	login.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        	startActivity(login);
        	// tutup pencarian lokasi
        	finish();
        }
    }
    
	
    private void check_gps() {
		// TODO Auto-generated method stub
    	latitute = (double) (Math.round(gps.getLatitude() * 100.0) / 100.0);
    	longitude = (double) (Math.round(gps.getLongitude() * 100.0) / 100.0);
    	tx_lokasi_ptgs.setText("Lokasi Anda  \nlatitute :" + latitute + "\nlongitude :" +longitude  );
	}


	private class MyAsyncTask extends AsyncTask<String, Void, JSONObject> {
	       
        protected JSONObject doInBackground(String... params) {
                UserFunctions userFunction = new UserFunctions();
                if (params.length != 1)
                        return null;
                //JSONObject json = userFunction.loginUser(params[0], params[1]);
                JSONObject json = userFunction.cekLokasi(params[0]);
                return json;
        }
       
        protected void onPostExecute(JSONObject json) {
	        try {
	        	tx_lokasi_cust.setText("Customer tidak ditemukan\n\n");
	        	CEK_LATITUTE = 0.0;
                CEK_LONGITUDE = 0.0;
	        	//editcarierror.setText("a");
	            /*if (json != null && json.getString(KEY_SUCCESS) != null) {
	                
	                String res = json.getString(KEY_SUCCESS);
	                JSONObject json_user = json.getJSONObject("user");
	                
	                editcarierror.setText(json_user.getString("name"));
	                
	            }*/
	        	if (json != null && json.getString(KEY_SUCCESS) != null) {
	                
	                String res = json.getString(KEY_SUCCESS);
	                double lat = Double.parseDouble(json.getString(KEY_LATITUTE));
	                double lon = Double.parseDouble(json.getString(KEY_LONGITUDE));
	                String nama = json.getString(KEY_NAMA);
	                
	                if(Integer.parseInt(res) == 1){
	                	
	                    CEK_LATITUTE = (double) (Math.round(lat * 100.0) / 100.0);
	                    CEK_LONGITUDE = (double) (Math.round(lon * 100.0) / 100.0);
	                    //Toast.makeText(getApplicationContext(), lat + " " +lon , Toast.LENGTH_LONG).show();
	                    tx_lokasi_cust.setText("Nama Customer : " + nama +"\nLokasi customer  \nlatitute :" + lat + "\nlongitude :" +lon );
	                	
	                }
	            }
	        } catch (JSONException e) {
	            e.printStackTrace();
	        }
        }
    }
}