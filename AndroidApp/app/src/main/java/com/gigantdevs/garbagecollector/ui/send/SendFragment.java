package com.gigantdevs.garbagecollector.ui.send;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.Nullable;
import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProviders;

import com.gigantdevs.garbagecollector.MyRecyclerViewAdapter;
import com.gigantdevs.garbagecollector.R;

public class SendFragment extends Fragment {

    private SendViewModel sendViewModel;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        sendViewModel =
                ViewModelProviders.of(this).get(SendViewModel.class);
        View root = inflater.inflate(R.layout.fragment_send, container, false);
        final TextView textView = root.findViewById(R.id.text_send);
        sendViewModel.getText().observe(this, new Observer<String>() {
            @Override
            public void onChanged(@Nullable String s) {
                textView.setText("Hackaton Za čisto Sarajevo\n" +
                        "Problem neadekvatnog odlaganja otpada je prvenstveno uzrokovano nedostatkom kolektivne svijesti i edukacije. Također, prenatrpanost kontejnera uzrokuje odlaganje otpada na nepredviđena mjesta što dodatno otežava već nedovoljno održiv sistem prikupljanja otpada. Naš tim - CleanSa je došao do sljedećeg rješenja koje će dovesti do efikasnog načina prikupljanja otpada i aktivnog učešća građana u istom. Sistem se sastoji od modifikovanog smart kontejnera, aplikacije za komunalno preduzeće i građane (proizvođače otpada).");
            }
        });
        return root;
    }
}