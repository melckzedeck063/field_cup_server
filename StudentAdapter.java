package com.example.myapplication;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class StudentAdapter extends RecyclerView.Adapter<StudentAdapter.ContentViewHolder> {
List<Student_model> studentModelList;
Student student;
public StudentAdapter(Student student,List<Student_model> studentModelList){
    this.student=student;
    this.studentModelList=studentModelList;
}
    @NonNull
    @Override
    public ContentViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
    View view;
    view= LayoutInflater.from(student).inflate(R.layout.student_details,parent,false);
    return new ContentViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ContentViewHolder holder, int position) {
Student_model studentModal=studentModelList.get(position);
holder.id.setText(studentModal.getId());
holder.name.setText(studentModal.getFullname());
holder.phone.setText(studentModal.getPhone());
holder.address.setText(studentModal.getAddress());
    }

    @Override
    public int getItemCount() {
        return studentModelList.size();
    }

    public class ContentViewHolder extends RecyclerView.ViewHolder{
    TextView id,name,phone,address;
        public ContentViewHolder(@NonNull View itemView) {
            super(itemView);
            id=itemView.findViewById(R.id.stuid);
            name=itemView.findViewById(R.id.stuname);
            phone=itemView.findViewById(R.id.stuphone);
            address=itemView.findViewById(R.id.stuaddress);
        }
    }
}
