package com.gigantdevs.garbagecollector.ui.home;

import android.app.Notification;
import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.os.Bundle;
import android.preference.PreferenceManager;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.annotation.NonNull;
import androidx.core.app.NotificationCompat;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProviders;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.gigantdevs.garbagecollector.BackgroundService;
import com.gigantdevs.garbagecollector.GetDataService;
import com.gigantdevs.garbagecollector.MainActivity;
import com.gigantdevs.garbagecollector.MyRecyclerViewAdapter;
import com.gigantdevs.garbagecollector.Prijava;
import com.gigantdevs.garbagecollector.R;
import com.gigantdevs.garbagecollector.RetrofitClientInstance;
import com.google.gson.Gson;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import static android.content.Context.NOTIFICATION_SERVICE;

public class HomeFragment extends Fragment implements MyRecyclerViewAdapter.ItemClickListener {

    private HomeViewModel homeViewModel;
    MyRecyclerViewAdapter adapter;
    ArrayList<Prijava> prijave;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        homeViewModel =
                ViewModelProviders.of(this).get(HomeViewModel.class);
        View root = inflater.inflate(R.layout.fragment_home, container, false);
        homeViewModel.getText().observe(this, new Observer<String>() {
            @Override
            public void onChanged(@Nullable String s) {

            }
        });


        MyRecyclerViewAdapter.i = 0;

        return root;
    }


    @Override
    public void onViewCreated(@NonNull final View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        GetDataService service = RetrofitClientInstance.getRetrofitInstance().create(GetDataService.class);
        Call<List<Prijava>> call = service.getAllMojePrijave();
        call.enqueue(new Callback<List<Prijava>>() {
            @Override
            public void onResponse(Call<List<Prijava>> call, Response<List<Prijava>> response) {
                if(response.code() == 200){
                    List<Prijava> temp = response.body();
                    prijave = new ArrayList<>();
                    for(int i=0;i<temp.size();i++){
                        prijave.add(temp.get(i));
                    }

                    RecyclerView recyclerView = view.getRootView().findViewById(R.id.odobreno);
                    recyclerView.setLayoutManager(new

                            LinearLayoutManager(view.getContext()));
                    adapter =new

                            MyRecyclerViewAdapter(getContext(),prijave);
                    adapter.setClickListener(HomeFragment.this);
                    recyclerView.setAdapter(adapter);

                    SharedPreferences appSharedPrefs = PreferenceManager
                            .getDefaultSharedPreferences(view.getContext());
                    SharedPreferences.Editor prefsEditor = appSharedPrefs.edit();
                    Gson gson = new Gson();
                    String json = gson.toJson(prijave);
                    prefsEditor.putString("MyObject", json);
                    prefsEditor.commit();
                }
            }

            @Override
            public void onFailure(Call<List<Prijava>> call, Throwable t) {
                Log.i("TEST","NE VALJA "+t.getMessage());
            }
        });

        view.getContext().startService(new Intent(view.getContext(), BackgroundService.class));
    }

    @Override
    public void onItemClick(View view, int position) {
    }



}