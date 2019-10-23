package com.gigantdevs.garbagecollector.ui.slideshow;

import android.os.Bundle;
import android.transition.Slide;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProviders;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.gigantdevs.garbagecollector.MyRecyclerViewAdapter;
import com.gigantdevs.garbagecollector.Prijava;
import com.gigantdevs.garbagecollector.R;
import com.gigantdevs.garbagecollector.ui.home.HomeFragment;

import java.util.ArrayList;
import java.util.TooManyListenersException;

public class SlideshowFragment extends Fragment implements MyRecyclerViewAdapter.ItemClickListener {

    private SlideshowViewModel slideshowViewModel;
    MyRecyclerViewAdapter adapter;
    ArrayList<Prijava> prijave;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        slideshowViewModel =
                ViewModelProviders.of(this).get(SlideshowViewModel.class);
        View root = inflater.inflate(R.layout.fragment_slideshow, container, false);
        slideshowViewModel.getText().observe(this, new Observer<String>() {
            @Override
            public void onChanged(@Nullable String s) {

            }
        });
        MyRecyclerViewAdapter.i = 0;

        return root;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        prijave = new ArrayList<>();
        prijave.add(new Prijava("U ulici Zmaja od Bosne 8 postoji kabasti otpad koji je neropisno odložen.",-1));

        RecyclerView recyclerView = view.getRootView().findViewById(R.id.ponudeDrugih);
        recyclerView.setLayoutManager(new

                LinearLayoutManager(view.getContext()));
        adapter =new MyRecyclerViewAdapter(getContext(),prijave);
        adapter.setClickListener(SlideshowFragment.this);

        recyclerView.setAdapter(adapter);
    }

    @Override
    public void onItemClick(View view, int position) {
        view.findViewById(R.id.dugme).setBackgroundResource(R.drawable.filledstar);
    }
}