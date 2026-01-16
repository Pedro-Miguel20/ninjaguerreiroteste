"use client";

import { HeroUIProvider } from "@heroui/react";
import { ToastProvider } from "@heroui/toast";
import { ReactNode } from "react";

import { DictionaryProvider } from "@/src/config/dictionaryContext";
import { ptBR } from "@/src/dictionaries/default-language-collections/default-pt-BR";

export type Dictionary = typeof ptBR;

interface ProvidersProps {
  children: ReactNode;
  dict: Dictionary;
}

export function Providers({ children, dict }: ProvidersProps) {
  return (
    <HeroUIProvider>
      <ToastProvider placement="top-right" />
      <DictionaryProvider dict={dict}>
        {children}
      </DictionaryProvider>
    </HeroUIProvider>
  );
}
