package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Student extends AppCompatActivity {
RecyclerView studentDetails;
List<Student_model> studentModelList;
RequestQueue requestQueue;
StringRequest stringRequest;
String DETAILS_URL="http://192.168.155.134/testing/student.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_student);

        requestQueue=Volley.newRequestQueue(this);
        studentDetails=(RecyclerView) findViewById(R.id.studentdetails);
        studentDetails.setLayoutManager(new LinearLayoutManager(this));

        STUDENT_DETAILS();
    }

    public void STUDENT_DETAILS(){
        stringRequest=new StringRequest(Request.Method.GET, DETAILS_URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONArray jsonArray=new JSONArray(response);
                    for(int i=0;i<jsonArray.length();i++){
                        JSONObject jsonObject=jsonArray.getJSONObject(i);
                        studentModelList.add(new Student_model(
                                jsonObject.getString("id"),
                                jsonObject.getString("fullname"),
                                jsonObject.getString("phone"),
                                jsonObject.getString("address")
                        ));
                    }
                    StudentAdapter studentAdapter=new StudentAdapter(Student.this,studentModelList);
                    studentDetails.setAdapter(studentAdapter);
                } catch (JSONException e) {
                    throw new RuntimeException(e);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(Student.this, error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
        requestQueue.add(stringRequest);
    }
}