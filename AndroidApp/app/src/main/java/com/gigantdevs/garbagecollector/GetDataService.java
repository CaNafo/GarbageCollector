package com.gigantdevs.garbagecollector;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface GetDataService {
    @POST("getMojePrijave.php")
    Call<List<Prijava>> getAllMojePrijave();
}
