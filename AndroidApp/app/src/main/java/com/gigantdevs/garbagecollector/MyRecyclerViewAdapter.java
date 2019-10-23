package com.gigantdevs.garbagecollector;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class MyRecyclerViewAdapter extends RecyclerView.Adapter<MyRecyclerViewAdapter.ViewHolder> {

    private List<Prijava> mData;
    private LayoutInflater mInflater;
    private ItemClickListener mClickListener;
    public static int i = 0;
    // data is passed into the constructor
    public MyRecyclerViewAdapter(Context context, List<Prijava> data) {
        this.mInflater = LayoutInflater.from(context);
        this.mData = data;
    }

    // inflates the row layout from xml when needed
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        final View view;
        if(mData.get(i).getStatus()==1){
             view = mInflater.inflate(R.layout.recyclerview_row, parent, false);
        }else if(mData.get(i).getStatus()==0){
             view = mInflater.inflate(R.layout.recyclerview_row_orange, parent, false);
        }else if(mData.get(i).getStatus()==2){
             view = mInflater.inflate(R.layout.recyclerview_row_red, parent, false);
        }else {
            view = mInflater.inflate(R.layout.recyclerview_row_pregled, parent, false);
            view.findViewById(R.id.dugme).setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    view.findViewById(R.id.dugme).setBackgroundResource(R.drawable.filledstar);
                }
            });
        }

        i++;

        return new ViewHolder(view);
    }

    // binds the data to the TextView in each row
    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        String animal = mData.get(position).getOpis();
        holder.myTextView.setText(animal);
    }

    // total number of rows
    @Override
    public int getItemCount() {
        return mData.size();
    }


    // stores and recycles views as they are scrolled off screen
    public class ViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {
        TextView myTextView;

        ViewHolder(View itemView) {
            super(itemView);
            myTextView = itemView.findViewById(R.id.tvAnimalName);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View view) {
            if (mClickListener != null) mClickListener.onItemClick(view, getAdapterPosition());
        }
    }

    // convenience method for getting data at click position
    public String getItem(int id) {
        return mData.get(id).getOpis();
    }

    // allows clicks events to be caught
    public void setClickListener(ItemClickListener itemClickListener) {
        this.mClickListener = itemClickListener;
    }

    // parent activity will implement this method to respond to click events
    public interface ItemClickListener {
        void onItemClick(View view, int position);
    }
}