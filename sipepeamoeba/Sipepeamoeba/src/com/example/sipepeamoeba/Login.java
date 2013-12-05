package com.example.sipepeamoeba;

import library.DatabaseHandler;
import library.UserFunctions;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;


import org.json.JSONException;
import org.json.JSONObject;

import android.os.AsyncTask;

public class Login extends Activity implements android.view.View.OnClickListener {

	private final Context CONTEXT = this;
	private EditText id,passw;
	private Button masuk,batal,btnLinkToRegister;
	private TextView loginErrorMsg;
	
	// JSON Respon Nama Nodes
	private static String KEY_SUCCESS = "success";
	private static String KEY_ERROR = "error";
	private static String KEY_ERROR_MSG = "error_msg";
	private static String KEY_UID = "uid";
	private static String KEY_NAME = "name";
	private static String KEY_EMAIL = "email";
	private static String KEY_CREATED_AT = "created_at";
	
	
	GPSTracker gps;
	
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        setContentView(R.layout.activity_login);
        
        id = (EditText)findViewById(R.id.editId);
        passw = (EditText)findViewById(R.id.editPassword);
        masuk = (Button)findViewById(R.id.btnMasuk);
        batal = (Button)findViewById(R.id.btnBatal);
        btnLinkToRegister = (Button)findViewById(R.id.btnLinkToRegisterScreen);
        loginErrorMsg = (TextView)findViewById(R.id.login_error);
        
        btnLinkToRegister.setOnClickListener(this);
        masuk.setOnClickListener(this);
        batal.setOnClickListener(this);
    }
    
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.login, menu);
        return true;
    }

	

	@Override
	public void onClick(View v) {
		if(v == masuk){
			/*Intent go = new Intent(CONTEXT, Pencarian_lokasi.class);
			super.startActivity(go);
			*/
			String name = id.getText().toString();
		    String password = passw.getText().toString();                
		    new MyAsyncTask().execute(name, password);
		}
		else if(v == btnLinkToRegister){
            
			Intent i = new Intent(getApplicationContext(),
					RegisterActivity.class);
			i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
			startActivity(i);
			finish();
    		
		}
		else{
			id.setText("");
			passw.setText("");
		}
	}
	
	private class MyAsyncTask extends AsyncTask<String, Void, JSONObject> {
	       
        protected JSONObject doInBackground(String... params) {
                UserFunctions userFunction = new UserFunctions();
                if (params.length != 2)
                        return null;
                JSONObject json = userFunction.loginUser(params[0], params[1]);
                return json;
        }
       
        protected void onPostExecute(JSONObject json) {
                try {
            if (json != null && json.getString(KEY_SUCCESS) != null) {
                loginErrorMsg.setText("");
                String res = json.getString(KEY_SUCCESS);
                if(Integer.parseInt(res) == 1){
                    // user successfully logged in
                    // Store user details in SQLite Database
                    DatabaseHandler db = new DatabaseHandler(getApplicationContext());
                    JSONObject json_user = json.getJSONObject("user");
                     
                    // Clear all previous data in database
                    UserFunctions userFunction = new UserFunctions();
                    userFunction.logoutUser(getApplicationContext());
                    db.addUser(json_user.getString(KEY_NAME), json_user.getString(KEY_EMAIL), json.getString(KEY_UID), json_user.getString(KEY_CREATED_AT));                        
                     
                    // Launch Dashboard Screen
                    Intent utama = new Intent(getApplicationContext(), Utama.class);
                     
                    // Close all views before launching Dashboard
                    utama.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                    startActivity(utama);
                     
                    // Close Login Screen
                    finish();
                }else{
                    // Error in login
                    loginErrorMsg.setText("User ataupun password salah");
                }
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
        }
}

	
    
}
