"use client";
import { useTheme } from "../../../../providers/theme-provider";
import { Button } from "@heroui/react";
import {IconSunFilled, IconMoonFilled} from "@tabler/icons-react";

export default function ThemeSwitch() {
  const { theme, toggleTheme } = useTheme();

  return (
    <>
    <Button onClick={toggleTheme} size="sm">
      {theme === "light" ? <IconMoonFilled /> : <IconSunFilled />}
    </Button>
    </>
  );
}


