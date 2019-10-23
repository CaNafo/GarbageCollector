package com.gigantdevs.garbagecollector;

import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.Service;
import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Handler;
import android.os.IBinder;
import android.preference.PreferenceManager;
import android.util.Log;
import android.widget.Toast;

import androidx.core.app.NotificationCompat;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.gigantdevs.garbagecollector.ui.home.HomeFragment;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;
import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class BackgroundService extends Service {
    public Context context = this;
    public Handler handler = null;
    public static Runnable runnable = null;
    ArrayList<Prijava> prijave;

    public BackgroundService(){

    }
    @Override
    public IBinder onBind(Intent intent) {
        return null;
    }

    @Override
    public void onCreate() {
        handler = new Handler();
        runnable = new Runnable() {
            public void run() {

                GetDataService service = RetrofitClientInstance.getRetrofitInstance().create(GetDataService.class);
                Call<List<Prijava>> call = service.getAllMojePrijave();
                call.enqueue(new Callback<List<Prijava>>() {
                    @Override
                    public void onResponse(Call<List<Prijava>> call, Response<List<Prijava>> response) {
                        List<Prijava> temp = response.body();
                        SharedPreferences appSharedPrefs = PreferenceManager
                                .getDefaultSharedPreferences(getApplicationContext());
                        Gson gson = new Gson();
                        String json = appSharedPrefs.getString("MyObject", "");

                        Type type = new TypeToken<List<Prijava>>(){}.getType();
                        List<Prijava> prijavas = gson.fromJson(json, type);
                        for(int i=0;i<temp.size();i++){
                            if(prijavas.get(i).getStatus()!=temp.get(i).getStatus()){
                                showNotification(getApplicationContext(),"Obavještenje","Promjenjen je status jedne ili više vaših prijava.",new Intent());
                            }
                        }

                    }

                    @Override
                    public void onFailure(Call<List<Prijava>> call, Throwable t) {
                        Log.i("TEST","NE VALJA "+t.getMessage());
                    }
                });
                handler.postDelayed(runnable, 5000);
            }
        };

        handler.postDelayed(runnable, 15000);
    }

    @Override
    public void onDestroy() {
        /* IF YOU WANT THIS SERVICE KILLED WITH THE APP THEN UNCOMMENT THE FOLLOWING LINE */
        //handler.removeCallbacks(runnable);
        Toast.makeText(this, "Service stopped", Toast.LENGTH_LONG).show();
    }

    public void showNotification(Context context, String title, String body, Intent intent) {
        NotificationManager notificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);

        PendingIntent contentIntent = PendingIntent.getActivity(context, 0,
                new Intent(context, MainActivity.class), 0);

        int notificationId = 1;
        String channelId = "channel-01";
        String channelName = "Channel Name";
        int importance = NotificationManager.IMPORTANCE_HIGH;

        if (android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.O) {
            NotificationChannel mChannel = new NotificationChannel(
                    channelId, channelName, importance);
            notificationManager.createNotificationChannel(mChannel);
        }

        NotificationCompat.Builder mBuilder = new NotificationCompat.Builder(context, channelId)
                .setSmallIcon(R.mipmap.ic_launcher)
                .setContentTitle(title)
                .setContentText(body)
                .setContentIntent(contentIntent);

        TaskStackBuilder stackBuilder = TaskStackBuilder.create(context);
        stackBuilder.addNextIntent(intent);
        PendingIntent resultPendingIntent = stackBuilder.getPendingIntent(
                0,
                PendingIntent.FLAG_UPDATE_CURRENT
        );
        mBuilder.setContentIntent(contentIntent);

        notificationManager.notify(notificationId, mBuilder.build());
    }
}
