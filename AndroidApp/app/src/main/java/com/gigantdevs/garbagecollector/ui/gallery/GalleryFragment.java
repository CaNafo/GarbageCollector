package com.gigantdevs.garbagecollector.ui.gallery;

import android.Manifest;
import android.app.Activity;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.location.Location;
import android.os.Bundle;
import android.util.Base64;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProviders;

import com.gigantdevs.garbagecollector.GetDataService;
import com.gigantdevs.garbagecollector.MainActivity;
import com.gigantdevs.garbagecollector.Prijava;
import com.gigantdevs.garbagecollector.PrijavaAPI;
import com.gigantdevs.garbagecollector.R;
import com.gigantdevs.garbagecollector.RetrofitClientInstance;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.tasks.OnSuccessListener;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.List;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class GalleryFragment extends Fragment implements OnSuccessListener {

    private GalleryViewModel galleryViewModel;
    private static final int CAMERA_REQUEST = 1888;
    private ImageView imageView;
    private static final int MY_CAMERA_PERMISSION_CODE = 100;
    private Button btnSend;
    private EditText txtOpis;
    private String lng;
    private String lon;
    String encodedImage = " ";

    private FusedLocationProviderClient fusedLocationClient;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        galleryViewModel =
                ViewModelProviders.of(this).get(GalleryViewModel.class);
        View root = inflater.inflate(R.layout.fragment_gallery, container, false);
        galleryViewModel.getText().observe(this, new Observer<String>() {
            @Override
            public void onChanged(@Nullable String s) {

            }
        });
        return root;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        btnSend = view.findViewById(R.id.btnSend);
        txtOpis = view.findViewById(R.id.txtOpis);
        fusedLocationClient = LocationServices.getFusedLocationProviderClient(getContext());

        this.imageView = (ImageView)view.findViewById(R.id.imageView1);
        Button photoButton = (Button) view.findViewById(R.id.button1);
        photoButton.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                Intent cameraIntent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(cameraIntent, CAMERA_REQUEST);
            }
        });

        fusedLocationClient.getLastLocation()
                .addOnSuccessListener(getActivity(), new OnSuccessListener<Location>() {
                    @Override
                    public void onSuccess(Location location) {
                        // Got last known location. In some rare situations this can be null.
                        if (location != null) {
                            Log.i("TEST","Lokacija: "+location.getLatitude()+" "+location.getLongitude());
                            lng = ""+location.getLatitude();
                            lon = ""+location.getLongitude();
                        }
                    }
                });

        btnSend.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getContext().getApplicationContext(),"Uspješno ste poslali Vašu prijavu!",Toast.LENGTH_LONG).show();
                PrijavaAPI service = RetrofitClientInstance.getRetrofitInstance().create(PrijavaAPI.class);
                Call<ResponseBody> call = service.prijavi(encodedImage,lon,lng,txtOpis.getText().toString());

                call.enqueue(new Callback<ResponseBody>() {
                    @Override
                    public void onResponse(Call<ResponseBody> call, Response<ResponseBody> response) {
                        Log.i("TEST","NES "+response.code());
                        Log.i("TEST","NES "+response.message().toString());
                        try {
                            Log.i("TEST","NES "+response.body().string());
                        } catch (IOException e) {
                            e.printStackTrace();
                        }
                        Log.i("TEST","NES "+response.message());
                    }

                    @Override
                    public void onFailure(Call<ResponseBody> call, Throwable t) {

                    }
                });
                startActivity(new Intent(getContext(), MainActivity.class));
            }
        });
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults)
    {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if (requestCode == MY_CAMERA_PERMISSION_CODE)
        {
            if (grantResults[0] == PackageManager.PERMISSION_GRANTED)
            {
                Toast.makeText(getContext(), "camera permission granted", Toast.LENGTH_LONG).show();
                Intent cameraIntent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(cameraIntent, CAMERA_REQUEST);
            }
            else
            {
                Toast.makeText(getContext(), "camera permission denied", Toast.LENGTH_LONG).show();
            }
        }
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == CAMERA_REQUEST && resultCode == Activity.RESULT_OK)
        {
            Bitmap photo = (Bitmap) data.getExtras().get("data");
            imageView.setImageBitmap(photo);
            ByteArrayOutputStream baos = new ByteArrayOutputStream();
            photo.compress(Bitmap.CompressFormat.JPEG, 100, baos); //bm is the bitmap object
            byte[] b = baos.toByteArray();
            encodedImage = Base64.encodeToString(b, Base64.DEFAULT);
            encodedImage = encodedImage.replaceAll("\r\n","");
            encodedImage = encodedImage.replaceAll("\n","");
            Log.i("TEST",encodedImage);
        }
    }

    @Override
    public void onSuccess(Object o) {

    }
}