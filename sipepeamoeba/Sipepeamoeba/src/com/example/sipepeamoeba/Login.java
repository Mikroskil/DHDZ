package com.example.sipepeamoeba;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Login extends Activity implements android.view.View.OnClickListener {

	private final Context CONTEXT = this;
	private EditText id,password;
	private Button masuk,batal;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        setContentView(R.layout.activity_login);
        
        id = (EditText)findViewById(R.id.editId);
        password= (EditText)findViewById(R.id.editPassword);
        masuk = (Button)findViewById(R.id.btnMasuk);
        batal = (Button)findViewById(R.id.btnBatal);
        
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
			Intent go = new Intent(CONTEXT, Pencarian_lokasi.class);
			super.startActivity(go);
			
		}
		else{
			id.setText("");
			password.setText("");
		}
	}

	
    
}
