package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Register_Activity extends AppCompatActivity {
    EditText id,fullname,phone,address,password,cpassword;
    Button register;
StringRequest stringRequest;
RequestQueue requestQueue;
String Register_URL="http://192.168.155.134/testing/register.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
requestQueue=Volley.newRequestQueue(this);

        id=(EditText) findViewById(R.id.id);
        fullname=(EditText) findViewById(R.id.fullname);
        phone=(EditText) findViewById(R.id.phone);
        address=(EditText) findViewById(R.id.address);
        password=(EditText) findViewById(R.id.password);
        cpassword=(EditText) findViewById(R.id.cpassword);
        register=(Button) findViewById(R.id.submit);

register.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View view) {
        REGISTRATION();
    }
});

    }

    public void REGISTRATION(){
        stringRequest=new StringRequest(Request.Method.POST, Register_URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonObject=new JSONObject(response);
                    String result=jsonObject.getString("success");
                    if(result.equals("1")){
                        Toast.makeText(Register_Activity.this, "Hii Imeenda", Toast.LENGTH_SHORT).show();
                    }else if(result.equals("0")){
                        Toast.makeText(Register_Activity.this, "Umeyatimba", Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    throw new RuntimeException(e);
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Register_Activity.this, error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> parameters=new HashMap<>();
                parameters.put("id",id.getText().toString());
                parameters.put("fullname",fullname.getText().toString());
                parameters.put("address",address.getText().toString());
                parameters.put("password",password.getText().toString());
                parameters.put("phone",phone.getText().toString());
                return parameters;
            }
        };
        requestQueue.add(stringRequest);
    }
}