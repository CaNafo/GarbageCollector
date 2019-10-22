package com.gigantdevs.garbagecollector;

import com.google.gson.annotations.SerializedName;

public class Prijava {
    @SerializedName("opis")
    private String opis;
    @SerializedName("status")
    private int status;

    public Prijava(String opis, int status){
        this.opis = opis;
        this.status = status;
    }

    public String getOpis() {
        return opis;
    }

    public void setOpis(String opis) {
        this.opis = opis;
    }

    public int getStatus() {
        return status;
    }

    public void setStatus(int status) {
        this.status = status;
    }
}
