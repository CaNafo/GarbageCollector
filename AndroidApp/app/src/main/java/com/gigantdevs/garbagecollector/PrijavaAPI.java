package com.gigantdevs.garbagecollector;

import java.util.HashMap;
import java.util.Map;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FieldMap;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface PrijavaAPI {
    @FormUrlEncoded
    @POST("savePrijava.php")
    Call<ResponseBody> prijavi(@Field("slika") String slika,
                                           @Field("lon") String lon,
                                           @Field("lat") String lat,
                                           @Field("opis") String opis);
}
